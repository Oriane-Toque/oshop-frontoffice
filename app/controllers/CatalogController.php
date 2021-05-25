<?php

  class CatalogController {

    public function category($routeVarInfos) {

      $this->show('product.list');
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

      require_once __DIR__.'/../views/partials/header.tpl.php';
      require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
      require_once __DIR__.'/../views/partials/footer.tpl.php';
    }
  }

?>