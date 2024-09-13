<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("URL_BASE", "http://localhost:8080/ep04/");

require __DIR__ . "/vendor/autoload.php";

require __DIR__ . "/vendor/coffeecode/router/src/Router.php";

use coffeecode\router\Router;

$router = new Router(URL_BASE);


$router->namespace(namespace:"Source\App");

//Web home
$router->group(null);
$router->get(route: "/", handler: "Web:home"); 
$router->get(route: "/{filter}/{page}", handler: "Web:home");

//blog

$router->group(group:"blog");
$router->get(route: "/", handler: "Web:blog"); 
$router->get(route: "/{post_uri}", handler: "Web:post");
$router->get(route: "/categoria/{cat_uri}", handler: "Web:contact"); 

//contatos

$router->group(group:"contato");
$router->get(route: "/", handler: "Web:contact"); 
$router->post(route: "/", handler: "Web:contact"); 
$router->get(route: "/{sector}", handler: "Web:contact");
$router->get(route: "/suporte", handler: "Web:support");

//ADMIN Home

$router->group(group:"admin");
$router->get(route: "/", handler: "Admin:home"); 



//Erros

$router->get(route: "/{filter}/{page}", handler: "Web:home");


$router->group("ooops");
$router->get(route:"/{errcode}", handler:"Web:error"); 


$router->dispatch();

if($router->error())
{
    $router->redirect(route: "/ooops/{$router->error()}"); 
}