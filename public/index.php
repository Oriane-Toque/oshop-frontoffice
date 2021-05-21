<?php
    // Notre point d'entrée unique pour toutes les pages du projet

    // On pense a inclure le fichier qui contient la classe MainController
    require_once __DIR__ . "/../app/controllers/MainController.php";

    // On récupère notre partie "fixe" de l'URL
    // Ici, le chemin entre localhost et le dossier S05-projet-oshop-blue
    $baseURL = $_SERVER['BASE_URI'];

    // On récupère ensuite la partie "variable" de l'URL
    // Ici, tout ce qui se trouve après "S05-projet-oshop-blue"
    // C'est à cela qu'on va comparer nos URL de routes
    $currentURL = $_GET['_url'] ?? "/";

    // On fait un tableau de toutes nos routes avec comme clé, l'URL
    $routes = [
        // Page d'accueil
        "/" => [
            "controller" => "MainController",
            "method"     => "home",
        ]
    ];

    // On récupère dans $routeInfo la case correspondante de $routes
    // Cette dernière se trouve à la clé du tableau à l'URL actuelle
    // ex home : $routes['/'];
    $routeInfo = $routes[ $currentURL ];

    // A partir de là on instancie le bon controleur
    // et on appelle la bonne méthode
    $controllerName = $routeInfo['controller']; // <= "MainController"
    $methodName     = $routeInfo['method'];     // Pour l'accueil : "home"

    // On instancie ensuite dynamiquement un controlleur dont le nom
    // est stocké dans la variable $controllerName
    $controller = new $controllerName();
    
    // Puis on appelle tout aussi dynamiquement sa méthode dont le nom
    // est stocké dans la variable $methodName
    $controller->$methodName();

    var_dump( $routeInfo );