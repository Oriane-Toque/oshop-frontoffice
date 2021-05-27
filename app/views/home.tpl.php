<section>
  <div class="container-fluid">
    <!-- début 2 1ères catégories -->
    <div class="row mx-0">
    <!-- 1ère boucle = 2 catégories -->
    <?php for($i = 0; $i < 2; $i++) : ?>
      <div class="col-md-6">
        <div class="card border-0 text-white text-center"><img src="<?= $_SERVER['BASE_URI']; ?>/<?= $viewVars['category'][$i]->getPicture(); ?>" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center">
            <div class="w-100 py-3">
              <h2 class="display-3 font-weight-bold mb-4"><?= $viewVars['category'][$i]->getName(); ?></h2><a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['category'][$i]->getId()] ); ?>" class="btn btn-light"><?= $viewVars['category'][$i]->getSubtitle(); ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php endfor; ?>
    <!-- fin boucle -->
    </div>
    <!-- fin 2 1ères catégories -->
    <!-- début 3 autres catégories -->
    <div class="row mx-0">
    <!-- 2ème boucle = 3 catégories -->
    <?php for($i = 2; $i < count($viewVars['category']); $i++) : ?>
      <div class="col-lg-4">
        <div class="card border-0 text-center text-white"><img src="<?= $_SERVER['BASE_URI']; ?>/<?= $viewVars['category'][$i]->getPicture(); ?>" alt="Card image" class="card-img">
          <div class="card-img-overlay d-flex align-items-center">
            <div class="w-100">
              <h2 class="display-4 mb-4"><?= $viewVars['category'][$i]->getName(); ?></h2><a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['category'][$i]->getId()] ); ?>" class="btn btn-link text-white"><?= $viewVars['category'][$i]->getSubtitle(); ?>
                <i class="fa-arrow-right fa ml-2"></i></a>
            </div>
          </div>
        </div>
      </div>
    <?php endfor; ?>
    <!-- fin 2ème boucle -->
    </div>
  </div>
</section>