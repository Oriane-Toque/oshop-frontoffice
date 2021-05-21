<?php

  // point d'entrée unique pour toutes les pages de notre projet
  require_once __DIR__.'/../app/controllers/MainController.php';
  require_once __DIR__.'/../app/controllers/CatalogController.php';

  // on récupère notre partie fixe de l'url
  $baseURL = $_SERVER['BASE_URI'];

  // on récupère ensuite la partie variable de l'url, tout ce qui se trouve après notre dossier projet
  // c'est à cela qu'on va comparer nos url de routes
  $currentURL = $_GET['_url'] ?? '/';

  // tableau des routes
  $routes = [
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
  $controller->$methodName();

?>