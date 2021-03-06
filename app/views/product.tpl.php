<section class="hero">
  <div class="container">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb justify-content-center">
      <li class="breadcrumb-item"><a href="<?= $_SERVER['BASE_URI'] ?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?= $router->generate('catalog.category', ['id' => $viewVars['category']->getId()]); ?>"><?= $viewVars['category']->getName(); ?></a></li>
    </ol>
  </div>
</section>

<section class="products-grid">
  <div class="container-fluid">
    <div class="row">
      <!-- product-->
      <div class="col-lg-6 col-sm-12">
        <div class="product-image">
          <a href="<?= $_SERVER['BASE_URI'] ?>/<?= $viewVars[$viewVars['page']]->getPicture(); ?>" class="product-hover-overlay-link">
            <img src="<?= $_SERVER['BASE_URI'] ?>/<?= $viewVars[$viewVars['page']]->getPicture(); ?>" alt="product" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12">
        <div class="mb-3">
          <h3 class="h3 text-uppercase mb-1"><?= $viewVars[$viewVars['page']]->getName(); ?></h3>
          <div class="text-muted">by <em><?= $viewVars['brand']->getName(); ?></em></div>
          <div>
            <!-- Note étoiles -> améliorations, dynamisations grace à la boucle et condition avec opérateur ternaire
            si note < $i alors class="fa fa-star" sinon class="fa fa-star-o" -->
            <?php for ($i = 1; $i < 6; $i++) : ?>
              <i class="fa fa-star<?= $viewVars[$viewVars['page']]->getRate() < $i ? "-o" : "" ?>"></i>
            <?php endfor ?>
          </div>   
        </div>
        <div class="my-2">
          <div class="text-muted"><span class="h4"><?= $viewVars[$viewVars['page']]->getPriceForCurrentCurrency(); ?></span> TTC</div>
        </div>
        <div class="product-action-buttons">
          <form action="" method="post">
            <input type="hidden" name="product_id" value="1">
            <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
          </form>
        </div>
        <div class="mt-5">
          <p>
            <?= $viewVars[$viewVars['page']]->getDescription(); ?>
          </p>
        </div>
      </div>
      <!-- /product-->
    </div>

  </div>
</section>