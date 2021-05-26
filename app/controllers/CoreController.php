<?php

  class CoreController {

    // TODO
    // on crée une propriété qui va nous permettre de stocker pour toute la classe, les variables communes a toutes nos pages
    protected $commonViewVars = [];

    public function __construct()
    {
      // dans notre constructeur de notre controleur on va récupérer toutes les données communes à toutes nos pages (les pages générées par ce controleur)
      $brandModel = new Brand();
      $footerBrands = $brandModel->findForFooter();

      $typeModel = new Type();
      $footerTypes = $typeModel->findForFooter();

      $this->commonViewVars['footerTypes'] = $footerTypes;
      $this->commonViewVars['footerBrands'] = $footerBrands;

      dump($this->commonViewVars);
    }

    protected function show($viewName, $viewVars = []) {

      global $router;

      require_once __DIR__.'/../views/partials/header.tpl.php';
      require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
      require_once __DIR__.'/../views/partials/footer.tpl.php';
    }
  }