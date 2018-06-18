<?php

// retocar todas las salidas sin filtro, sale una lista de clientes

// en vez de avisar el error, avisa el acierto. (fiaca);

class ConsultaCliente{
     
    // consultar cliente
public static function ConsultarCliente($nacionalidad="",$sexo=""){

    echo "consulta si hay clientes <br><br>";

    // mostrar todos los aciertos de clientes
    $clientesmuestra = array();
    $clientesnacionalidad = array();
    $clientessexo = array();

    $aliases = Cliente::TraerTodosLosClientes();

    $todosh = array();

    //proceso

    foreach ($aliases as $key => $value) {
        

        $todosh[] = Cliente::OBJCliente($value->Nom,$value->Nac,$value->Sex,$value->Edad,$value->idcliente);

    }

  

    $resul  = 0;

    $lanac;
    $elsex ="";

  /* prueba 1
  
  echo "<pre>";
    var_dump($todosh);
    echo "</pre>";*/

        // diferenciar lo que entra

        // Del resultado de la comparacion

    $nacionalidad = $nacionalidad != "" ? $nacionalidad : NULL;
    
    $sexo = $sexo != "" ? $sexo : NULL;

    if (isset($nacionalidad) || isset($sexo)){

        // los dos
        if (isset($nacionalidad) && isset($sexo)){        
         
        /*    echo "<pre>";
        var_dump($todosh);
        echo "</pre>";*/

        //
            
        // el Y 
            foreach ($todosh as $key => $value) {

                if($nacionalidad == $value->getnacionalidad() && $sexo===$value->getsexo()){

                 //return "Conicide $nacionalidad y $sexo";

                 return array_filter($todosh,function($element)use($nacionalidad,$sexo){                  
                    return ($element->getnacionalidad() == $nacionalidad && $element->getsexo() == $sexo);

                 });


                }
                
            }

            echo "No existe $nacionalidad Y $sexo simultaneamente, pero... <br><br>";

          $clientesnacionalidad = ConsultaCliente::EntregarNacionalidad($todosh,$nacionalidad);                   
                       
            if(isset($clientesnacionalidad)){

                foreach ($clientesnacionalidad as $key => $value) {
                    
                    $clientesmuestra[] = $value;

                }            
            }
             
            $clientessexo = ConsultaCliente::EntregarSexo($todosh,$sexo);
            
            if(isset($clientessexo)){
                
                foreach ($clientessexo as $key => $value) {
                    
                    $clientesmuestra[] = $value;

                }                
                
            }

            if(empty($clientesnacionalidad)){
                echo "$nacionalidad no encontrada <br>" ;
            }

            if(empty($clientessexo)){
                echo "$sexo no encontrado <br>";
            }


            return array_unique($clientesmuestra,$orden = SORT_REGULAR);                
           
            // FIN OR 
        } else {

            if($nacionalidad != ""){

                $clientesnacionalidad = ConsultaCliente::EntregarNacionalidad($todosh,$nacionalidad);                   
                if(empty($clientesnacionalidad))
                {
                    echo "No hay registros de $nacionalidad ";
                    return false;
                }
                    return $clientesnacionalidad;
            }else{
                $clientessexo = ConsultaCliente::EntregarSexo($todosh,$sexo);

                if(empty($clientessexo)){echo "No hay registros de $sexo";
                return false;}
                return $clientessexo;
            }

    
     } // osexo o nacionalidad viene

    }   
    
} // Consultar Cliente

public static function EntregarNacionalidad($todosh,$nacionalidad){

    $clientesnacionalidad = array();

    foreach ($todosh as $key => $value) {
                
        if($nacionalidad == $value->getnacionalidad()){           
                          
            $clientesnacionalidad = array_filter($todosh,function($element)use($nacionalidad){                  
                 return ($element->getnacionalidad() == $nacionalidad );
             
             
             });// filter

             break;
             
         }
         
     }

     return $clientesnacionalidad;
    
}

public static function EntregarSexo($todosh,$sexo){

    $clientessexo = array();

    foreach ($todosh as $key => $value) {               
         
        if($sexo == $value->getsexo()){
    
            $clientessexo = array_filter($todosh,function($element)use($sexo){                  
                return ($element->getsexo() == $sexo );
            
            
            });// filter

            break;
            
            
        }

    }

    return $clientessexo;
}


}// Clase

?>