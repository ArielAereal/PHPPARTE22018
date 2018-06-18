<?php

// los parametros en el nexo

class Empleado

{

private $nombre;
private $tipo;
private $turno;
private $id;

public function __construct(){

}

public static function OBJEmpleado($nombre,$tipo,$turno,$id=""){

    $empleado = new Empleado();

    $empleado->setnombre($nombre);
    $empleado->settipo($tipo);
    $empleado->setturno($turno);    

    if($id != ""){

        $empleado->setid($id);

    }


    return $empleado;
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

public function gettipo(){

    return $this->tipo;

}

public function settipo($tipo){

    $this->tipo = $tipo;

}

public function getturno(){

    return $this->turno;

}

public function setturno($turno){

    $this->turno = $turno;

}

public function InsertarEmpleado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleados (nombre,tipo,turno) values('".$this->getnombre()."','".$this->gettipo()."','".$this->getturno()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

     }

          
public static function TraerTodosLosEmpleados()
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select idempleado,nombre as Nom, tipo as Tipo,turno as Turno from empleados");
             $consulta->execute();			
             return $consulta->fetchAll(PDO::FETCH_CLASS, "Empleado");		
    }



}// Empleado


?>