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
      $products_category = $productModel->findByCategory($routeVarInfos['id']);

      // création de clés => valeurs
      $viewVars = [ 
        'category' => $category,
        'products_category' => $products_category
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
        'category' => $category
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
      $products_type = $productModel->findByType($routeVarInfos['id']);

      $viewVars = [
        'type' => $type,
        'products_type' => $products_type
      ];

      $this->show('product.list', $viewVars);

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
      $products_brand = $productModel->findByBrand($routeVarInfos['id']);

      $viewVars = [
        'brand' => $brand,
        'products_brand' => $products_brand
      ];

      $this->show('product.list', $viewVars);
    }
  }

?>