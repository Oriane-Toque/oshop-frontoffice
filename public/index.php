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
  $router->map('GET', '/category/[i:id]/by-name', 'CatalogController@category', 'catalog.category.byname');
  $router->map('GET', '/category/[i:id]/by-rate', 'CatalogController@category', 'catalog.category.byrate');
  $router->map('GET', '/category/[i:id]/by-price', 'CatalogController@category', 'catalog.category.byprice');

  $router->map('GET', '/brand/[i:id]',    'CatalogController@brand',    'catalog.brand');
  $router->map('GET', '/brand/[i:id]/by-name', 'CatalogController@brand', 'catalog.brand.byname');
  $router->map('GET', '/brand/[i:id]/by-rate', 'CatalogController@brand', 'catalog.brand.byrate');
  $router->map('GET', '/brand/[i:id]/by-price', 'CatalogController@brand', 'catalog.brand.byprice');

  $router->map('GET', '/type/[i:id]',     'CatalogController@type',     'catalog.type');
  $router->map('GET', '/type/[i:id]/by-name', 'CatalogController@type', 'catalog.type.byname');
  $router->map('GET', '/type/[i:id]/by-rate', 'CatalogController@type', 'catalog.type.byrate');
  $router->map('GET', '/type/[i:id]/by-price', 'CatalogController@type', 'catalog.type.byprice');

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