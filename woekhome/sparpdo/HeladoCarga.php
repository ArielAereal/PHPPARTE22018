<?php

class Helado

{

private $Sabor;
private $Tipo;
private $precio;
private $cantidad;

public function __construct(){

}

public static function OBJHelado($Sabor,$Tipo,$precio,$cantidad){

    $helado = new Helado();

    $helado->setSabor($Sabor);
    $helado->setTipo($Tipo);
    $helado->setprecio($precio);
    $helado->setcantidad($cantidad);

    //setters

    return $helado;
}

public function getSabor(){

    return $this->Sabor;

}

public function setSabor($Sabor){

    $this->Sabor = $Sabor;

}

public function getTipo(){

    return $this->Tipo;

}

public function setTipo($Tipo){

    $this->Tipo = $Tipo;

}

public function getprecio(){

    return $this->precio;

}

public function setprecio($precio){

    $this->precio = $precio;

}

public function getcantidad(){

    return $this->cantidad;

}

public function setcantidad($cantidad){

    $this->cantidad = $cantidad;

}


}


?>