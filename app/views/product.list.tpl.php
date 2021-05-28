  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="<?= $_SERVER['BASE_URI']; ?>">Home</a></li>
        <li class="breadcrumb-item active"><?= $viewVars[$viewVars['page']]->getName(); ?></li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading"><?= $viewVars[$viewVars['page']]->getName(); ?></h1>
        <?php if($viewVars['page'] === 'category') : ?>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted"><?= $viewVars[$viewVars['page']]->getSubtitle(); ?></p>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
          Affichage de <strong></strong>résultats
        </div>
        <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
        </div>
        <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
          <li class="nav-item dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Default
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="<?= $router->generate('catalog.'.$viewVars['page'], ['id' => $viewVars[$viewVars['page']]->getId()]); ?>">Default</a></li>
              <li><a href="<?= $router->generate('catalog.'.$viewVars['page'].'.byname', ['id' => $viewVars[$viewVars['page']]->getId()]); ?>">Name</a></li>
              <li><a href="<?= $router->generate('catalog.'.$viewVars['page'].'.byrate', ['id' => $viewVars[$viewVars['page']]->getId()]); ?>">Rate</a></li>
              <li><a href="<?= $router->generate('catalog.'.$viewVars['page'].'.byprice', ['id' => $viewVars[$viewVars['page']]->getId()]); ?>">Price</a></li>
            </ul>
          </li>
        </div>
      </header>
      <div class="row">



        <!-- product-->
        <?php foreach ($viewVars['products'] as $currentProduct) : ?>
          <div class="product col-xl-3 col-lg-4 col-sm-6">
            <div class="product-image">
              <a href="<?= $router->generate('catalog.product', ['id' => $currentProduct->getId()]) ?>" class="product-hover-overlay-link">
                <img src="<?= $_SERVER['BASE_URI'] . '/' . $currentProduct->getPicture(); ?>" alt="product" class="img-fluid">
              </a>
            </div>
            <div class="product-action-buttons">
              <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
              <a href="<?= $router->generate('catalog.product', ['id' => $currentProduct->getId()]) ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
            </div>
            <div class="py-2">
              <p class="text-muted text-sm mb-1"><?= $viewVars[$viewVars['page']]->getName(); ?></p>
              <h3 class="h6 text-uppercase mb-1"><a href="<?= $router->generate('catalog.product', ['id' => $currentProduct->getId()]) ?>" class="text-dark"><?= $currentProduct->getName(); ?></a></h3><span class="text-muted"><?= $currentProduct->getPrice(); ?> €</span>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- /product-->
      </div>
    </div>
  </section>