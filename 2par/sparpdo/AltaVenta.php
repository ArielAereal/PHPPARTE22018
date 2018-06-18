<?php

// ver fechas PDO Exception
// mientras lo guardo como un string
// e imagenes

class Venta

{

private $idlocal;
private $idcliente;
private $idempleado;
private $idhelado;
private $fecha;
private $cantidad;
private $id;

public function __construct(){

}

public static function OBJVenta($idlocal,$idcliente,$idempleado,$idhelado,$fecha,$cantidad,$id=""){

    $venta = new Venta();

    $venta->setidlocal($idlocal);
    $venta->setidcliente($idcliente);
    $venta->setidempleado($idempleado);
    $venta->setidhelado($idhelado);
// ver la fecha
    $venta->setfecha($fecha);
    $venta->setcantidad($cantidad);
    

    if($id != ""){

        $venta->setid($id);

    }


    return $venta;
}

public function getid(){

    return $this->id;

}

public function setid($id){

    $this->id = $id;

}

public function getidcliente(){

    return $this->idcliente;

}

public function setidcliente($idcliente){

    $this->idcliente = $idcliente;

}

public function getidlocal(){

    return $this->idlocal;

}

public function setidlocal($idlocal){

    $this->idlocal = $idlocal;

}

public function getidempleado(){

    return $this->idempleado;

}

public function setidempleado($idempleado){

    $this->idempleado = $idempleado;

}

public function getidhelado(){

    return $this->idhelado;

}

public function setidhelado($idhelado){

    $this->idhelado = $idhelado;

}

public function getfecha(){

    return $this->fecha;

}

public function setfecha($fecha){

    $this->fecha = $fecha;

}

public function getcantidad(){

    return $this->cantidad;

}

public function setcantidad($cantidad){

    $this->cantidad = $cantidad;

}

public function InsertarVenta()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (idlocal,idcliente,idempleado,idhelado,fecha,cantidad)values ('".$this->getidlocal()."','".$this->getidcliente()."','".$this->getidempleado()."','".$this->getidhelado()."','".$this->getfecha()."','".$this->getcantidad()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
                
                // Fatal error: Uncaught PDOException: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'fecha' cannot be null in 
                //DATE_FORMAT('".$this->getfecha()."','%d %m %Y')

     }
     
public static function TraerTodasLasVentas()
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select idlocal,direccion as Dir, idlocalidad as IdLoc,estado as Est from locales");
             $consulta->execute();			
             return $consulta->fetchAll(PDO::FETCH_CLASS, "Local");		
    }


    public static function Validar($idhelado,$cantidad){
        
        $loshela = array();
        $aliases = Helado::TraerTodosLosHelados();

        foreach ($aliases as $key => $value) {
        

            $loshela[] = Helado::OBJHelado($value->sabor,$value->tipo,$value->Precio,$value->Cantidad,$value->idhelado);
    
        }    
        /*echo "<pre>";
        var_dump($loshela);
        echo "</pre>";*/

        foreach ($loshela as $key => $value) {
            
            // por post entran strings
            if($idhelado == $value->getid()){
                
                if($cantidad > $value->getcantidad())
                {
                    echo "No tenemos semejante cantidad de ".$value->getSabor() ."<br><br>";
                    return false;
                }else{
                    if(Helado::ActualizarHeladoPorVenta($value,$cantidad))
                    {
                        echo "Venta exitosa <br><br>";
                        return true;
                    }
                }
            }
        }

        return false;
    }

}// Venta


?>