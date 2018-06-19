<?php

// ver el cam???

// middleware para login

//localhost:8080/pruebafinal/index.php/media/ 

//anda

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseIÑnterface as Response;

require 'vendor/autoload.php';
require 'guia/AccesoDatos.php';
require 'guia/IApiUsable.php';
require 'medias.php';
require 'usuario.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/

// hacer el login

$app->group('/media', function () {
 
  $this->get('/listado/', \Media::class . ':TraerTodos');
 
  //$this->get('/{id}', \cdApi::class . ':traerUno');

  $this->post('/carga/', \Media::class . ':CargarUno');

  //$this->delete('/', \cdApi::class . ':BorrarUno');

  //$this->put('/', \cdApi::class . ':ModificarUno');
     
});

$app->group('/usuario', function () {
 
    $this->get('/listado/', \Media::class . ':TraerTodos');
   
    //$this->get('/{id}', \cdApi::class . ':traerUno');
  
    $this->post('/carga/', \Media::class . ':CargarUno');
  
    //$this->delete('/', \cdApi::class . ':BorrarUno');
  
    //$this->put('/', \cdApi::class . ':ModificarUno');
       
  });

$app->run();

?>