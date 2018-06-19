<?php
class Media implements IApiUsable
{

    // ver la foto
	private $idmedia;
 	private $color;
  	private $marca;
    private $precio;
    private $talle;
    private $foto;

    public function __construct(){}

    public static function OBJMedia($color,$marca,$precio,$talle,$foto,$idmedia=""){

            $media = new Media();
        
            $media->setcolor($color);
            $media->setmarca($marca);
            $media->setprecio($precio);

            $media->settalle($talle);
            $media->setfoto($foto);
            
            if($idmedia != ""){
        
                $media->setidmedia($idmedia);
        
            }
        
        
            return $media;
    }    

    public function getidmedia(){

        return $this->idmedia;
    
    }
    
    public function setidmedia($idmedia){
    
        $this->idmedia = $idmedia;
    
    }

    public function getcolor(){

        return $this->color;
    
    }
    
    public function setcolor($color){
    
        $this->color = $color;
    
    }

    public function getmarca(){

        return $this->marca;
    
    }
    
    public function setmarca($marca){
    
        $this->marca = $marca;
    
    }

    public function getprecio(){

        return $this->precio;
    
    }
    
    public function setprecio($precio){
    
        $this->precio = $precio;
    
    }

    public function gettalle(){

        return $this->talle;
    
    }
    
    public function settalle($talle){
    
        $this->talle = $talle;
    
    }

    public function getfoto(){

        return $this->foto;
    
    }
    
    public function setfoto($foto){
    
        $this->foto = $foto;
    
    }


  	/*public function BorrarCd()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from cds 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	 	public static function BorrarCdPorAnio($año)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from cds 				
				WHERE jahr=:anio");	
				$consulta->bindValue(':anio',$año, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	public function ModificarCd()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel='$this->titulo',
				interpret='$this->cantante',
				jahr='$this->año'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	 public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel=:titulo,
				interpret=:cantante,
				jahr=:anio
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
			return $consulta->execute();
	 }*/

  	public function mostrarDatos()
	{
	  	return "Metodo mostar: ".$this->getidmedia()."  ".$this->getcolor()."  ".$this->getmarca()." ".$this->getprecio()."  ".$this->gettalle()."  ".$this->getfoto();
	}
	 public function InsertarLaMedia()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into medias (color,marca,precio,talle,foto)values('".$this->getcolor()."','".$this->getmarca()."','".$this->getprecio()."','".$this->gettalle()."','".$this->getfoto()."')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();				

	 }
	 /*public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
				$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
				$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }*/
	 


  	public static function TraerTodasLasMedias()
	{
        $listadoListo = array();
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select idmedia,color as Color, marca as Marca, precio as Precio,talle as Talle,foto as Foto from medias");
            $consulta->execute();			
            


             $aliases = $consulta->fetchAll(PDO::FETCH_CLASS, "Media");		

             foreach ($aliases as $key => $value) {
                 $listadoListo[] = Media::OBJMedia($value->Color,$value->Marca,$value->Precio,$value->Talle,$value->Foto,$value->idmedia);
             }
             
             return $listadoListo;
	}

	/*public static function TraerUnCd($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
			return $cdBuscado;				

			
	}

	public static function TraerUnCdAnio($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=? AND jahr=?");
			$consulta->execute(array($id, $anio));
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}

	public static function TraerUnCdAnioParamNombre($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
	
	public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->execute(array(':id'=> $id,':anio'=> $anio));
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
    }*/
    
public function TraerTodos($request,$response,$args){
   

    var_dump(Media::TraerTodasLasMedias());
    return Media::TraerTodasLasMedias();
}

public function CargarUno($request,$response,$args){
    // $archivos = $request->getUploadedFiles();

  /*  $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("se guardo el cd");*/
    $ArrayDeParametros = $request->getParsedBody();

    $puntoque = array();   

    $elcolor = $ArrayDeParametros['color'];
    $lamarca = $ArrayDeParametros['marca'];
    $elprecio = $ArrayDeParametros['precio'];
    $eltalle = $ArrayDeParametros['talle'];
    
$puntoque = explode('.',$_FILES['foto']['name']);

$fin = array_pop($puntoque);

    // imagenes
    if(!file_exists("ImagenesDeHelados")){
        mkdir("ImagenesDeHelados");
    } 
    
    $archivoTmp = "$lamarca" ."_".$elcolor."_".$eltalle. ".". $fin;
          
    $destino = "ImagenesDeHelados/" . $archivoTmp;

 
    if (!move_uploaded_file($_FILES['foto']["tmp_name"], $destino)) {
        echo "subida mala de imagen";
        return false;
    }

    $mediaba = Media::OBJMedia($elcolor,$lamarca,$elprecio,$eltalle,$archivoTmp);    

    $mediaba->InsertarLaMedia();

    echo "Media agregada";

    return $response;
}

/*
 public function CargarUno($request, $response, $args) {
     	
        

        return $response;
    }

*/



}// MEdia