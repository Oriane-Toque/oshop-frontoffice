<?php

  namespace app\controllers;

  use \app\models\Category;
  use \app\models\Product;

  class CatalogController extends CoreController {

    public function category($routeVarInfos) {

      // on instancie notre model
      $category = new Category();
      // on appelle ensuite sa méthode find pour récupérer la bonne catégorie
      $category = $category->find($routeVarInfos['id']);
      /* dump($category->getName()); */

      // on a besoin de récupérer les produits par catégorie
      $productModel = new Product();
      // vu qu'on a récupéré la catégorie précédemment, on peut utiliser notre variable $category et récupérer son id grace à son getter
      $products = $productModel->findByCategory($routeVarInfos['id']);

      // création de clés => valeurs
      $viewVars = [ 
        'category' => $category,
        'products' => $products
      ];

      if ($category === false) :
        echo '<h2>Catégorie introuvable</h2>';
      else :
        $this->show('product.list', $viewVars);
      endif;
    }

    public function product($routeVarInfos) {

      $productModel = new Product();
      $product = $productModel->find($routeVarInfos['id']);

      $viewVars = [
        'product' => $product
      ];

      $this->show('product', $viewVars);
    }

    public function type($routeVarInfos) {

      $this->show('product.list');

    }

    public function brand($routeVarInfos) {

      $this->show('product.list');
    }
  }

?>