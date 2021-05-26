<?php

  class CatalogController {

    public function category($routeVarInfos) {

      dump($routeVarInfos);
      // on instancie notre model
      $category = new Category();
      // on appelle ensuite sa méthode find pour récupérer la bonne catégorie
      $category = $category->find($routeVarInfos['id']);
      /* dump($category->getName()); */

      // on a besoin de récupérer les produits par catégorie
      $productModel = new Product();
      // vu qu'on a récupéré la catégorie précédemment, on peut utiliser notre variable $category et récupérer son id grace à son getter
      $products = $productModel->findByCategory($category->getId());

      // création de clés => valeurs
      $viewVars = [ 
        'category' => $category,
        'products' => $products
      ];

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