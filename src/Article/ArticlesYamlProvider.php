<?php 
namespace App\Articles;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
class ArticlesYamlProvider{
    /**
     * Retourner les articles du fichier Article.yaml
     */
    public function getArticles(): iterable{
        try{
            return Yaml::parseFile(__DIR__.'articles.yaml');   
        } catch (ParseException $exception) {
            printf('Unable to parse the YAML string: %s', $exception->getMessage());
        }
    }
}
?>