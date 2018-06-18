<?php

class Local

{

private $direccion;
private $idlocalidad;
private $estado;
private $id;

public function __construct(){

}

public static function OBJLocal($direccion,$idlocalidad,$estado,$id=""){

    $local = new Local();

    $local->setdireccion($direccion);
    $local->setidlocalidad($idlocalidad);
    $local->setestado($estado);
    

    if($id != ""){

        $local->setid($id);

    }


    return $local;
}

public function getid(){

    return $this->id;

}

public function setid($id){

    $this->id = $id;

}

public function getdireccion(){

    return $this->direccion;

}

public function setdireccion($direccion){

    $this->direccion = $direccion;

}

public function getidlocalidad(){

    return $this->idlocalidad;

}

public function setidlocalidad($idlocalidad){

    $this->idlocalidad = $idlocalidad;

}

public function getestado(){

    return $this->estado;

}

public function setestado($estado){

    $this->estado = $estado;

}

public function InsertarLocal()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into locales (direccion,idlocalidad,estado)values('".$this->getdireccion()."','".$this->getidlocalidad()."','".$this->getestado()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

     }
     
public static function TraerTodosLosLocales()
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select idlocal,direccion as Dir, idlocalidad as IdLoc,estado as Est from locales");
             $consulta->execute();			
             return $consulta->fetchAll(PDO::FETCH_CLASS, "Local");		
    }



}// Locales


?>