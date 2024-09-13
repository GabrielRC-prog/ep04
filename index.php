<?php

define("URL_BASE", "http://localhost:8080/ep04/");

require __DIR__ . "/vendor/autoload.php";

require __DIR__ . "/vendor/coffeecode/router/src/Router.php";

use coffeecode\router\Router;

$router = new Router(URL_BASE);


$router->namespace("Source\App");


$router->group(null);
$router->get(route: "/", handler: "$Web:home"); 

$router->group("ooops");
$router->get(route:"/{errcode}", handler:"Web:error"); 


$router->dispatch();
if($router->error()){
    $router->redirect(route:"/ooops/{$router->error()}");
}