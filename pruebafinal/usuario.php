<?php
class Usuario implements IApiUsable
{
	private $idusuario;
 	private $nombre;
  	private $clave;
 
    public function __construct(){}

    public static function OBJUsuario($nombre,$clave,$idusuario=""){

            $usuario = new Usuario();
        
            $usuario->setnombre($nombre);
            $usuario->setclave($clave);
                        
            if($idusuario != ""){
        
                $usuario->setidusuario($idusuario);
        
            }
        
        
            return $usuario;
    }    

    public function getidusuario(){

        return $this->idusuario;
    
    }
    
    public function setidusuario($idusuario){
    
        $this->idusuario = $idusuario;
    
    }

    public function getnombre(){

        return $this->nombre;
    
    }
    
    public function setnombre($nombre){
    
        $this->nombre = $nombre;
    
    }

    public function getclave(){

        return $this->clave;
    
    }
    
    public function setclave($clave){
    
        $this->clave = $clave;
    
    } 	

  	public function mostrarDatos()
	{
	  	return "Metodo mostar: ".$this->getidusuario()."  ".$this->getnombre()."  ".$this->getclave();
    }
    
	public function InsertarElUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,clave,)values('".$this->getnombre()."','".$this->getclave()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();				

	 }

  	public static function TraerTodosLosUsuarios()
	{
            $listadoListo = array();
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select idusuario,nombre as Nombre, clave as Clave, from usuarios");
            $consulta->execute();			
            


             $aliases = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		

             foreach ($aliases as $key => $value) {
                 $listadoListo[] = Media::OBJUsuario($value->Nombre,$value->Clave,$value->idusuario);
             }
             
             return $listadoListo;
	}
    
public function TraerTodos($request,$response,$args){
   
    var_dump(Usuario::TraerTodosLosUsuarios());
    return Usuario::TraerTodosLosUsuarios();
}

public function CargarUno($request,$response,$args){
    
    $ArrayDeParametros = $request->getParsedBody();
    $elnombre = $ArrayDeParametros['nombre'];
    $laclave = $ArrayDeParametros['clave'];
        
    $iuserba = Usuario::OBJUsuario($elnombre,$laclave);    

    $iuserba->InsertarElUsuario();

    echo "Usuario agregado";

    return $response;
}

/*
 public function CargarUno($request, $response, $args) {
     	
        

        return $response;
    }

*/



}// MEdia