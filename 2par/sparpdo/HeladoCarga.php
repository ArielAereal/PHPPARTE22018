<?php

class Helado

{

private $Sabor;
private $Tipo;
private $precio;
private $cantidad;
//luego
//private $imagen_Helado;
private $id;


// no hay metodo Mostrar o tostring
public function __construct(){

}

public static function OBJHelado($Sabor,$Tipo,$precio,$cantidad,$id=""){

    $helado = new Helado();

    $helado->setSabor($Sabor);
    $helado->setTipo($Tipo);
    $helado->setprecio($precio);
    $helado->setcantidad($cantidad);  

    if($id != ""){

        $helado->setid($id);

    }


    return $helado;
}

public function getid(){

    return $this->id;

}

public function setid($id){

    $this->id = $id;

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

public function InsertarHelado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into helados (Sabor,Tipo,precio,cantidad)values('".$this->getSabor()."','".$this->getTipo()."','".$this->getprecio()."','".$this->getcantidad()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

     }
     
public static function TraerTodosLosHelados()
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select idhelado,Sabor as sabor, Tipo as tipo,precio as Precio,cantidad as Cantidad from helados");
             $consulta->execute();			
             // usar esta parte para transformar los objetos raros en objetos de mis clases
             return $consulta->fetchAll(PDO::FETCH_CLASS, "Helado");		
    }

    public static function ActualizarHeladoPorVenta($elhelado,$cantidad){

        $nuevaC = $elhelado->getcantidad()-$cantidad;

        $miPDO = AccesoDatos::dameUnObjetoAcceso();

        

        $consulta = $miPDO->RetornarConsulta("update helados set cantidad = '".$nuevaC."' where idhelado = '".$elhelado->getid()."'");

         $consulta->execute();

         echo "Cantidad de ".$elhelado->getSabor()." actualizada<br><br>";
         return true;

    }



}// Helado


?>