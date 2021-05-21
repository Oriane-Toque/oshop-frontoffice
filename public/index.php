<?php
  // on inclus l'autoload de composer qui va chercher tout le code
  // on ne push pas le dossier vendor, only composer.json & composer.lock
  require_once __DIR__.'/../vendor/autoload.php';
  // point d'entrée unique pour toutes les pages de notre projet
  require_once __DIR__.'/../app/controllers/MainController.php';
  require_once __DIR__.'/../app/controllers/CatalogController.php';
  
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
  $router->map('GET', '/', 'MainController@home', 'main.home');
  $router->map('GET', '/category/[i:id]', 'CatalogController@category', 'catalog.category');

  // match ne fait que retourner les infos de la route qui correspond, c'est à nous d'executer la bonne fonction !
  $routeInfo = $router->match();

  // dispatcher : c'est celui qui instancie le bon controleur qui execute la bonne méthode
  // les 2 informations se trouvent dans routeInfo['target'] sauf qu'on a besoin de les séparer. Actuellement elles sont collées par un symbole, @
  $routeInfoArray = explode('@', $routeInfo['target']);
  $controllerName = $routeInfoArray[0];
  $methodName = $routeInfoArray[1];

  $controller = new $controllerName();
  $controller->$methodName($routeInfo['params']); 

?>