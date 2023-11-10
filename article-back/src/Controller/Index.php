<?php

namespace Digi\Keha\Controller;

use Digi\Keha\Entity\article;
use Digi\Keha\Kernel\Views;
use Digi\Keha\Kernel\AbstractController;


class Index extends AbstractController {

    /**public function index()
    {
        $view = new Views();
        $tab = article::getAll();
        json_encode($tab);
        var_dump($tab);
        $view->setHtml('index.html');
        $view->render([
            'var2' => $tab
        ]);
    }*/

    public function getArticle(){
        $article = article::getAll();
       echo json_encode($article);
        //var_dump($article);
        return $article;
    }

    public function addArticle() {
         $article = article::insert([
             'libelle'=> $_POST['libelle'],
             'prix'=> $_POST['prix'],
         ]);
         return $article;
     }

}