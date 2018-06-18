<?php

// después de tanta práctica, ya me sale más rápido......



class ConsultaLocalidad{

public static function ConsultarLocalidad($Nombre="",$Provincia=""){

    $localidadesmuestra = array();
    $localidadesnombre = array();
    $localidadesprovincia = array();
    $todosh = array();

    echo "consulta si hay localidades en venta <br><br>";

    $aliases = Localidad::TraerTodasLasLocalidades();

    foreach ($aliases as $key => $value) {
        
        // aliases de la base de datoses
        $todosh[] = Localidad::OBJLocalidad($value->Nom,$value->Prov,$value->Est,$value->idlocalidad);
    }

     //prueba 1
    
   /* echo "<pre>";
    var_dump($todosh);
    echo "</pre>";*/
   

        // diferenciar lo que entra

        // Del resultado de la comparacion

    $nombre = $Nombre != "" ? $Nombre : NULL;
    
    $provincia = $Provincia != "" ? $Provincia : NULL; 

    if (isset($nombre) || isset($provincia)){       
        
        if (isset($nombre) && isset($provincia)){                

            foreach ($todosh as $key => $value) {
        
                if($nombre == $value->getnombre() && $provincia===$value->getprovincia()){

                 return array_filter($todosh,function($element)use($nombre,$provincia){                  
                    return ($element->getnombre() == $nombre && $element->getprovincia() == $provincia);

                 });


                }
                
            }

            echo "No existe $nombre Y $provincia simultaneamente, pero... <br><br>";

          $localidadesnombre = ConsultaLocalidad::EntregarNombre($todosh,$nombre);                   
                       
            if(isset($localidadesnombre)){

                foreach ($localidadesnombre as $key => $value) {
                    
                    $localidadesmuestra[] = $value;

                }            
            }
             
            $localidadesprovincia = ConsultaLocalidad::EntregarProvincia($todosh,$provincia);
            
            if(isset($localidadesprovincia)){
                
                foreach ($localidadesprovincia as $key => $value) {
                    
                    $localidadesmuestra[] = $value;

                }                
                
            }

            if(empty($localidadesnombre)){
                echo "$nombre no encontrado <br>" ;
            }

            if(empty($localidadesprovincia)){
                echo "$provincia no encontrada <br>";
            }

            return array_unique($localidadesmuestra,$orden = SORT_REGULAR);                
           
            // FIN OR 
        } else {    
                  if($provincia != "") {

                    $localidadesprovincia = ConsultaLocalidad::EntregarProvincia($todosh,$provincia);
                    if(empty($localidadesprovincia)){
                        echo "No hay registros de $provincia";
                        return false;
                    }

                    return $localidadesprovincia;
                  }else{

                    $localidadesnombre = ConsultaLocalidad::EntregarNombre($todosh,$nombre);

                    if(empty($localidadesnombre))
                    {
                        echo "No hay registros de $nombre";
                        return false;
                    }
                    
                    return $localidadesnombre;

                  }



        }

    }

} // Consultar Localidad

public static function EntregarNombre($todosh,$nombre){

    $localidadesnombre = array();

    foreach ($todosh as $key => $value) {
                
        if($nombre == $value->getnombre()){           
                          
            $localidadesnombre = array_filter($todosh,function($element)use($nombre){                  
                 return ($element->getnombre() == $nombre );
             
             
             });// filter

             break;
             
         }
         
     }

     return $localidadesnombre;
    
}

public static function EntregarProvincia($todosh,$provincia){

    $localidadesprovincia = array();

    foreach ($todosh as $key => $value) {
                
        if($provincia == $value->getprovincia()){           
                          
            $localidadesprovincia = array_filter($todosh,function($element)use($provincia){                  
                 return ($element->getprovincia() == $provincia );
             
             
             });// filter

             break;
             
         }
         
     }

     return $localidadesprovincia;
    
}

}

?>