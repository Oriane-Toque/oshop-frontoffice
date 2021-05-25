<?php

  class CatalogController {

    public function category($routeVarInfos) {

      // on instancie notre model
      $category = new Category();
      // on appelle ensuite sa méthode find pour récupérer la bonne catégorie
      $category = $category->find($routeVarInfos['id']);
      /* dump($category->getName()); */

      /* $category->findAll(); */

      $viewVars = [ 'category' => $category ];

      $this->show('product.list', $viewVars);

    }

    public function product($routeVarInfos) {

      $this->show('product');
    }

    public function type($routeVarInfos) {

      $this->show('product.list');
    }

    public function brand($routeVarInfos) {

      $this->show('product.list');
    }

    private function show($viewName, $viewVars = []) {

      global $router;

      require_once __DIR__.'/../views/partials/header.tpl.php';
      require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
      require_once __DIR__.'/../views/partials/footer.tpl.php';
    }
  }

?>