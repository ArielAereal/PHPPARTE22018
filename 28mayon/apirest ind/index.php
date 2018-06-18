<?php

// clase prepo
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../composer/vendor/autoload.php';



$app = new \Slim\App([]);



// acá la funcionalidad de la ABM

// helado, empleado, ventas, etc.

// hacerlo en la web y probalo con el postman

$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! ,a SlimFramework");
    return $response;

});

$app->post('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("POST => Bienvenido!!! ,a SlimFramework");
    return $response;

});

$app->delete('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("DELETE => Bienvenido!!! ,a SlimFramework");
    return $response;

});

$app->put('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("PUT => Bienvenido!!! ,a SlimFramework");
    return $response;

});



$app->post('/HELADO', function (Request $request, Response $response) {    
    $response->getBody()->write("POST => Bienvenido!!! ,a SlimFramework");
    return $response;

});



$app->run();