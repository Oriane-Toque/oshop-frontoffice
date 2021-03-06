<?php

  namespace app\controllers;

  use \app\models\Category;
  use \app\models\Product;
  use \app\models\Type;
  use \app\models\Brand;

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
        'products' => $products,
        'page' => "category"
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

      $brandModel = new Brand();
      $brand = $brandModel->find($product->getBrandId());

      $categoryModel = new Category();
      $category = $categoryModel->find($product->getCategoryId());

      $viewVars = [
        'product' => $product,
        'brand' => $brand,
        'category' => $category,
        'page' => "product"
      ];

      $this->show('product', $viewVars);
    }

    public function type($routeVarInfos) {

      // on instancie notre model
      $type = new Type();
      // on appelle ensuite sa méthode find pour récupérer la bonne catégorie
      $type = $type->find($routeVarInfos['id']);
      /* dump($category->getName()); */

      // on a besoin de récupérer les produits par catégorie
      $productModel = new Product();
      // vu qu'on a récupéré la catégorie précédemment, on peut utiliser notre variable $category et récupérer son id grace à son getter
      $products = $productModel->findByType($routeVarInfos['id']);

      $viewVars = [
        'type' => $type,
        'products' => $products,
        'page' => "type"
      ];

      if ($type === false) :
        echo '<h2>Type introuvable</h2>';
      else :
        $this->show('product.list', $viewVars);
      endif;

    }

    public function brand($routeVarInfos) {
      
      // on instancie notre model
      $brand = new Brand();
      // on appelle ensuite sa méthode find pour récupérer la bonne catégorie
      $brand = $brand->find($routeVarInfos['id']);
      /* dump($category->getName()); */

      // on a besoin de récupérer les produits par catégorie
      $productModel = new Product();
      // vu qu'on a récupéré la catégorie précédemment, on peut utiliser notre variable $category et récupérer son id grace à son getter
      $products = $productModel->findByBrand($routeVarInfos['id']);

      $viewVars = [
        'brand' => $brand,
        'products' => $products,
        'page' => "brand"
      ];

      if ($brand === false) :
        echo '<h2>Marque introuvable</h2>';
      else :
        $this->show('product.list', $viewVars);
      endif;
    }
  }

?>