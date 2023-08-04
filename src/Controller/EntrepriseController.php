<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise;
class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        //Ajout d'entreprise
        $entreprise = new Entreprise();
        $entreprise->setTitre('Architecte');
        $entreprise->setEmail('arijtriki@gmail.com');
        $entreprise->setSpecialite('web development');
        $entreprise->setCreatedAt(new \DateTimeImmutable());

        $entityManager->persist($entreprise);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return $this->render('entreprise/index.html.twig', [
            'id' =>$entreprise->getId(),
        ]);
    }


 /**
* @Route("/entreprise/{id}", name="entreprise_show")
*/
public function show($id)
{
 $entreprise = $this->getDoctrine()
            ->getRepository(Entreprise::class)
            ->find($id);
 
 
 if (!$entreprise) {
        throw $this->createNotFoundException(
            'No entreprise found for id '.$id
 );
 }
 return $this->render('entreprise/show.html.twig',[
    'entreprise'=>$entreprise
 ]);
 
 }

}
