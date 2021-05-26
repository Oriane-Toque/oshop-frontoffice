<?php

  class MainController {

    // on crée une propriété qui va nous permettre de stocker pour toute la classe, les variables communes a toutes nos pages
    private $commonViewVars = [];

    public function __construct()
    {
      // dans notre constructeur de notre controleur on va récupérer toutes les données communes à toutes nos pages (les pages générées par ce controleur)
      $brandModel = new Brand();
      $footerBrands = $brandModel->findForFooter();

      $typeModel = new Type();
      $footerTypes = $typeModel->findForFooter();

      $this->commonViewVars['footerTypes'] = $footerTypes;
      $this->commonViewVars['footerBrands'] = $footerBrands;
    }

    public function home() {

      $this->show('home');
    }

    public function legal() {

      $this->show('legal');
    }

    private function show($viewName, $viewVars = []) {

      global $router;

      require_once __DIR__.'/../views/partials/header.tpl.php';
      require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
      require_once __DIR__.'/../views/partials/footer.tpl.php';
    }
  }

?>