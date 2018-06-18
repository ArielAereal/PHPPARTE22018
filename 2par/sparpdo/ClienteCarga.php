<?php

class Cliente

{

private $nombre;
private $nacionalidad;
private $sexo;
private $edad;
private $id;

public function __construct(){

}

public static function OBJCliente($nombre,$nacionalidad,$sexo,$edad,$id=""){

    $cliente = new Cliente();

    $cliente->setnombre($nombre);
    $cliente->setnacionalidad($nacionalidad);
    $cliente->setsexo($sexo);
    $cliente->setedad($edad);  

    if($id != ""){

        $cliente->setid($id);

    }


    return $cliente;
}

public function getid(){

    return $this->id;

}

public function setid($id){

    $this->id = $id;

}

public function getnombre(){

    return $this->nombre;

}

public function setnombre($nombre){

    $this->nombre = $nombre;

}

public function getnacionalidad(){

    return $this->nacionalidad;

}

public function setnacionalidad($nacionalidad){

    $this->nacionalidad = $nacionalidad;

}

public function getsexo(){

    return $this->sexo;

}

public function setsexo($sexo){

    $this->sexo = $sexo;

}

public function getedad(){

    return $this->edad;

}

public function setedad($edad){

    $this->edad = $edad;

}

public function InsertarCliente()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into clientes (nombre,nacionalidad,sexo,edad)values('".$this->getnombre()."','".$this->getnacionalidad()."','".$this->getsexo()."','".$this->getedad()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

     }
     
public static function TraerTodosLosClientes()
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select idcliente,nombre as Nom, nacionalidad as Nac,sexo as Sex,edad as Edad from clientes");
             $consulta->execute();			
             return $consulta->fetchAll(PDO::FETCH_CLASS, "Cliente");		
    }



}// Clientes


?>