<?php

  namespace app\controllers;

  use \app\models\Category;

  class MainController extends CoreController {

    public function home() {

      // on instancie notre model
      $category = new Category();
      // on appelle ensuite sa méthode find pour récupérer la bonne catégorie
      $category = $category->findForHome();

      $viewVars = [
        'category' => $category
      ];

      $this->show('home', $viewVars);
    }

    public function legal() {

      $this->show('legal');
    }
  }

?>