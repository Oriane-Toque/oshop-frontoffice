<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'] ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'] ?>/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'] ?>/assets/css/styles.css">
  <title>oShop</title>
</head>

<body>
  <header>
    <div class="top-bar">
      <div class="container-fluid">
        <div class="row d-flex align-items-center">
          <div class="col-sm-7 d-none d-sm-block">
            <ul class="list-inline mb-0">
              <li class="list-inline-item pr-3 mr-0">
                <i class="fa fa-phone"></i>
                01 02 03 04 05
              </li>
              <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">
                Livraison offerte à partir de 100€
              </li>
            </ul>
          </div>
          <!-- TODO AMELIORER EN AYANT ACCES A NOS DEVISES SUR TOUTES LES PAGES PB D'ACCESSIBILITE DE $viewVars['page'] -->
          <?php if(isset($viewVars['page'])) : ?>
          <div class="col-sm-5 d-flex justify-content-end">
            <!-- Currency Dropdown-->
            <div class="dropdown pl-3 ml-0">
              <a id="currencyDropdown" href="<?= $router->generate('catalog.'.$viewVars['page'], ['id' => $viewVars[$viewVars['page']]->getId()]); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle topbar-link">EUR</a>
              <div aria-labelledby="currencyDropdown" class="dropdown-menu dropdown-menu-right">
                <a href="<?= $router->generate('catalog.'.$viewVars['page'].'.EUR', ['id' => $viewVars[$viewVars['page']]->getId()]); ?>" class="dropdown-item text-sm">EUR</a>
                <a href="<?= $router->generate('catalog.'.$viewVars['page'].'.USD', ['id' => $viewVars[$viewVars['page']]->getId()]); ?>" class="dropdown-item text-sm">USD</a>
                <a href="<?= $router->generate('catalog.'.$viewVars['page'].'.GBP', ['id' => $viewVars[$viewVars['page']]->getId()]); ?>" class="dropdown-item text-sm">GBP</a>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light">
      <div class="container-fluid">

        <!-- Navbar Header  -->
        <a href="<?= $router->generate('main.home') ?>" class="navbar-brand">
          oShop
        </a>
        <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Navbar Collapse -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a href="<?= $router->generate('main.home') ?>" class="nav-link active">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $router->generate('main.legal') ?>" class="nav-link active">
                Mentions légales
              </a>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Catégorie
              <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <?php foreach($viewVars['common']['categoryList'] as $currentCategory) : ?>
                <li><a href="<?= $router->generate('catalog.category', ['id' => $currentCategory->getId()]); ?>"><?= $currentCategory->getName(); ?></a></li>
              <?php endforeach; ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Types de produit
              <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <?php foreach($viewVars['common']['typeList'] as $currentType) : ?>
                <li><a href="<?= $router->generate('catalog.type', ['id' => $currentType->getId()]); ?>"><?= $currentType->getName(); ?></a></li>
              <?php endforeach; ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Marques
              <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
              <?php foreach($viewVars['common']['brandList'] as $currentBrand) : ?>
                <li><a href="<?= $router->generate('catalog.brand', ['id' => $currentBrand->getId()]); ?>"><?= $currentBrand->getName(); ?></a></li>
              <?php endforeach; ?>
              </ul>
            </li>
          </ul>

          <div class="d-flex align-items-center justify-content-between justify-content-lg-end mt-1 mb-2 my-lg-0">
            <!-- Search Button-->
            <div class="nav-item navbar-icon-link">
              <a href="#" class="navbar-icon-link"><i class="fa fa-search"></i></a>
            </div>

            <!-- User Not Logged - link to login page-->
            <div class="nav-item">
              <a href="#" class="navbar-icon-link"><i class="fa fa-user"></i></a>
            </div>

            <!-- Cart Dropdown-->
            <div class="nav-item dropdown">
              <a href="cart.html" class="navbar-icon-link d-lg-none">
                <span class="badge badge-secondary">New</span>
              </a>
              <div class="d-none d-lg-block">
                <a id="cartdetails" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="cart.html" class="navbar-icon-link dropdown-toggle">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="badge badge-secondary">
                    2
                  </span>
                </a>
                <div aria-labelledby="cartdetails" class="dropdown-menu dropdown-menu-right p-4">
                  <div class="navbar-cart-product-wrapper">
                    <!-- cart item-->
                    <div class="navbar-cart-product">
                      <div class="w-100">
                        <div>
                          <a href="detail.html" class="navbar-cart-product-link">
                            Retro socks
                          </a>
                          <small class="d-block text-muted">
                            Quantité : 1
                          </small>
                          <strong class="d-block text-sm">
                            45 €
                          </strong>
                        </div>
                      </div>
                    </div>

                    <div class="navbar-cart-product">
                      <div class="w-100">
                        <div>
                          <a href="detail.html" class="navbar-cart-product-link">
                            Dillinger
                          </a>
                          <small class="d-block text-muted">
                            Quantité : 1
                          </small>
                          <strong class="d-block text-sm">
                            30 €
                          </strong>
                        </div>
                      </div>
                    </div>

                    <!-- total price-->
                    <div class="navbar-cart-total">
                      <span class="text-uppercase text-muted">
                        Total
                      </span>
                      <strong class="text-uppercase">
                        75 €
                      </strong>
                    </div>

                    <!-- buttons-->
                    <div class="d-flex justify-content-between">
                      <a href="cart.html" class="btn btn-link text-dark mr-3">
                        Voir le panier <i class="fa-arrow-right fa"></i>
                      </a>
                      <a href="#" class="btn btn-outline-dark">
                        Commander
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>