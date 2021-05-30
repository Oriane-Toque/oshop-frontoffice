<?php
  // on inclus l'autoload de composer qui va chercher tout le code
  // on ne push pas le dossier vendor, only composer.json & composer.lock
  // quand on modifie le composer, il faut lui indiquer les changements : composer dump-autoload (à faire dans le terminal !)
  require_once __DIR__.'/../vendor/autoload.php';

  // on récupère notre partie fixe de l'url
  $baseURL = $_SERVER['BASE_URI'];

  // on récupère ensuite la partie variable de l'url, tout ce qui se trouve après notre dossier projet
  // c'est à cela qu'on va comparer nos url de routes
  $currentURL = $_GET['_url'] ?? '/';

  $sortProducts = [
    'byname',
    'byrate',
    'byprice'
  ];

  $convertDevise = [
    'EUR',
    'USD',
    'GBP'
  ];

  // tableau des routes
/*  $routes = [
    '/' => [
      'controller' => 'MainController',
      'method' => 'home'
    ],

    '/category' => [
      'controller' => 'CatalogController',
      'method' => 'category'
    ]
  ];

  $routeInfo = $routes[$currentURL];

  $controllerName = $routeInfo['controller'];
  $methodName = $routeInfo['method'];

  $controller = new $controllerName();
  $controller->$methodName(); */

  $router = new AltoRouter();
  $router->setBasePath($baseURL);
  // on mappe nos routes, on dit a AltoRouter de mettre les routes suivantes dans un tableau (interne à la classe), on le fait grace à la méthode map()
  // MainController -----------------------------------------------------------------------------
  $router->map('GET', '/',      'MainController@home',  'main.home');
  $router->map('GET', '/legal', 'MainController@legal', 'main.legal');

  // CatalogController --------------------------------------------------------------------------
  $router->map('GET', '/category/[i:id]', 'CatalogController@category', 'catalog.category');
  $router->map('GET', '/brand/[i:id]',     'CatalogController@brand',     'catalog.brand');
  $router->map('GET', '/type/[i:id]',     'CatalogController@type',     'catalog.type');

  /* ROUTES POUR LE TRI DES PRODUITS */
  foreach($sortProducts as $sortProduct) :
    $router->map('GET', "/category/[i:id]/$sortProduct", 'CatalogController@category', "catalog.category.$sortProduct");
    $router->map('GET', "/brand/[i:id]/$sortProduct", 'CatalogController@brand', "catalog.brand.$sortProduct");
    $router->map('GET', "/type/[i:id]/$sortProduct", 'CatalogController@type', "catalog.type.$sortProduct");
  endforeach;

  /* ROUTES CONVERSION DEVISES */
  // démarrage de la session utilisateur avec par défaut $_SESSION vide
  // cela équivaut dans notre cas à la monnaie par défaut : l'euro
  session_start($_SESSION = []);

  foreach($convertDevise as $devise) :
    $router->map('GET', "/category/[i:id]/$devise", 'CatalogController@category', "catalog.category.$devise");
    $router->map('GET', "/brand/[i:id]/$devise", 'CatalogController@brand', "catalog.brand.$devise");
    $router->map('GET', "/type/[i:id]/$devise", 'CatalogController@type', "catalog.type.$devise");
  endforeach;

  // condition qui vérifie la devise sélectionné et la stocke dans $_SESSION
  // puis réorientation vers home avec sauvegarde de la session
  if(isset($_GET['_url'])) :
    if(str_contains($_GET['_url'], 'USD') === true) :
      $_SESSION = ['currency' => 'USD'];
      header('Location:'.$_SERVER['BASE_URI']);
    elseif(str_contains($_GET['_url'], 'GBP') === true) :
      $_SESSION = ['currency' => 'GBP'];
      header('Location:'.$_SERVER['BASE_URI']);
    elseif(str_contains($_GET['_url'], 'EUR') === true) :
      $_SESSION = ['currency' => 'EUR'];
      header('Location:'.$_SERVER['BASE_URI']);
    endif;
  endif;

  $router->map('GET', '/product/[i:id]',  'CatalogController@product',  'catalog.product');


  // match ne fait que retourner les infos de la route qui correspond, c'est à nous d'executer la bonne fonction !
  $routeInfo = $router->match();
  /* dump($routeInfo); */

  // GERER L'ERREUR 404 SI $routeInfo VAUT FALSE
  // réparation du css
  if($routeInfo === false) :
    // on aurait aussi pu gérer ca dans une méthode
    http_response_code(404);
    echo 'ERROR 404 : Page non trouvée';
    // on arrête l'éxecution de la page
    exit();
  endif;

  // dispatcher : c'est celui qui instancie le bon controleur qui execute la bonne méthode
  // les 2 informations se trouvent dans routeInfo['target'] sauf qu'on a besoin de les séparer. Actuellement elles sont collées par un symbole, @
  $routeInfoArray = explode('@', $routeInfo['target']);
  /* dump($routeInfoArray); */
  // Maintenant qu'on utilise des NameSpace il faut préciser le FQCN de la classe
  $controllerName = "app\\controllers\\".$routeInfoArray[0];
  $methodName = $routeInfoArray[1];

  $controller = new $controllerName();
  $controller->$methodName($routeInfo['params']); 

?>