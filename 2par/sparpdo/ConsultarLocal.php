<?php

// después de tanta práctica, ya me sale más rápido......


// El enunciado: 
/**
 *9- (1pt.) ConsultarLocal.php: (por POST) Se ingresa localidad,
 * tipo, si coincide con algún registro, retornar el listado de 
 * coincidencias de lo contrario informar que no hay, si de ese 
 * tipo o de ese turno.
 * 
 * La clase Local no tiene tipo
 * 
 * Hecho por la mitad
 * 
 * Voy a consultar solamente por localidad
 *  
 * ver el estado como tipo

 */

class ConsultaLocal{

public static function ConsultarLocal($Localidad=""){

        
    $localeslocalidad = array();
    $todosh = array();
    $ytodas = array();

    echo "consulta si hay locales en venta <br><br>";

    $aliases = Local::TraerTodosLosLocales();

    foreach ($aliases as $key => $value) {
        
        // aliases de la base de datoses
        $todosh[] = Local::OBJLocal($value->Dir,$value->IdLoc,$value->Est,$value->idlocal);
    }

     //prueba 1
    
   /* echo "<pre>";
    var_dump($todosh);
    echo "</pre>";*/
         
    
    $localidad = $Localidad != "" ? $Localidad : NULL; 

    $elidloco;

    // transformar/manejar el idlocalidad

    $aliases = Localidad::TraerTodasLasLocalidades();

    foreach ($aliases as $key => $value) {
        
        // aliases de la base de datoses
        $ytodas[] = Localidad::OBJLocalidad($value->Nom,$value->Prov,$value->Est,$value->idlocalidad);
    }

   /* var_dump($localidad);
    var_dump($elidloco);
    var_dump($ytodas);*/

    foreach ($ytodas as $key => $value) {
        
        if($localidad == $value->getnombre())

        {
            $elidloco = $value->getid();
            break;
        }
    }



    if(empty($elidloco)){
        echo "$localidad no coincide con la lista ingresada de localidades";
        return false;
    }
               
            $localeslocalidades = ConsultaLocal::EntregarLocalidad($todosh,$elidloco);
            
            if(empty($localeslocalidades)){
                echo "$localidad no encontrada entre los locales registrados<br>";
                return false;
            }                        

            return $localeslocalidades;                 

} // Consultar Local

public static function EntregarLocalidad($todosh,$elidloco){

    $localeslocalidades = array();

    foreach ($todosh as $key => $value) {
                
        if($elidloco == $value->getidlocalidad()){           
                          
            $localeslocalidades = array_filter($todosh,function($element)use($elidloco){                  
                 return ($element->getidlocalidad() == $elidloco );
             
             
             });// filter

             break;
             
         }
         
     }

     return $localeslocalidades;
    
}

}

?>