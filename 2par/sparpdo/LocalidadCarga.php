<?php

class Localidad

{

private $nombre;
private $provincia;
private $estado;
private $id;

public function __construct(){

}

public static function OBJLocalidad($nombre,$provincia,$estado,$id=""){

    $localidad = new Localidad();

    $localidad->setnombre($nombre);
    $localidad->setprovincia($provincia);
    $localidad->setestado($estado);
    

    if($id != ""){

        $localidad->setid($id);

    }


    return $localidad;
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

public function getprovincia(){

    return $this->provincia;

}

public function setprovincia($provincia){

    $this->provincia = $provincia;

}

public function getestado(){

    return $this->estado;

}

public function setestado($estado){

    $this->estado = $estado;

}

public function InsertarLocalidad()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into localidades (nombre,provincia,estado)values('".$this->getnombre()."','".$this->getprovincia()."','".$this->getestado()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

     }
     
public static function TraerTodasLasLocalidades()
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select idlocalidad,nombre as Nom, provincia as Prov,estado as Est from localidades");
             $consulta->execute();			
             return $consulta->fetchAll(PDO::FETCH_CLASS, "Localidad");		
    }



}// Clientes


?>