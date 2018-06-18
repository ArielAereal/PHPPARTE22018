<?php

// turno y tipo

// retocar las salidas y el metodo nuevo filter

class ConsultaEmpleado{

public static function ConsultarEmpleado($Turno="",$Tipo=""){

    $empleadosmuestra = array();
    $empleadosturno = array();
    $empleadostipo = array();

    echo "consulta si hay empleados <br><br>";

    $aliases = Empleado::TraerTodosLosEmpleados();

    $todosh = array();

    foreach ($aliases as $key => $value) {
        

        // aliases de la base de datoses
        $todosh[] = Empleado::OBJEmpleado($value->Nom,$value->Tipo,$value->Turno,$value->idempleado);

    }

     //prueba 1
   /* 
   echo "<pre>";
    var_dump($todosh);
    echo "</pre>";
    */

        // diferenciar lo que entra

        // Del resultado de la comparacion

    $turno = $Turno != "" ? $Turno : NULL;
    
    $tipo = $Tipo != "" ? $Tipo : NULL; 

    if (isset($turno) || isset($tipo)){

        // los dos

        
        if (isset($turno) && isset($tipo)){                

            foreach ($todosh as $key => $value) {
        
                if($turno == $value->getturno() && $tipo===$value->gettipo()){

                 return array_filter($todosh,function($element)use($turno,$tipo){                  
                    return ($element->getturno() == $turno && $element->gettipo() == $tipo);

                 });


                }
                
            }

            echo "No existe $turno Y $tipo simultaneamente, pero... <br><br>";

          $empleadosturno = ConsultaEmpleado::EntregarTurno($todosh,$turno);                   
                       
            if(isset($empleadosturno)){

                foreach ($empleadosturno as $key => $value) {
                    
                    $empleadosmuestra[] = $value;

                }            
            }
             
            $empleadostipo = ConsultaEmpleado::EntregarTipo($todosh,$tipo);
            
            if(isset($empleadostipo)){
                
                foreach ($empleadostipo as $key => $value) {
                    
                    $empleadosmuestra[] = $value;

                }                
                
            }

            if(empty($empleadosturno)){
                echo "$turno no encontrado <br>" ;
            }

            if(empty($empleadostipo)){
                echo "$tipo no encontrado <br>";
            }

            return array_unique($empleadosmuestra,$orden = SORT_REGULAR);                
           
            // FIN OR 
        } else {    
                  if($tipo != "") {

                    $empleadostipo = ConsultaEmpleado::EntregarTipo($todosh,$tipo);
                    if(empty($empleadostipo)){
                        echo "No hay registros de $tipo";
                        return false;
                    }

                    return $empleadostipo;
                  }else{

                    $empleadosturno = ConsultaEmpleado::EntregarTurno($todosh,$turno);

                    if(empty($empleadosturno))
                    {
                        echo "No hay registros de $turno";
                        return false;
                    }
                    
                    return $empleadosturno;

                  }



        }

    }

} // Consultar Empleado

public static function EntregarTurno($todosh,$turno){

    $empleadosturno = array();

    foreach ($todosh as $key => $value) {
                
        if($turno == $value->getturno()){           
                          
            $empleadosturno = array_filter($todosh,function($element)use($turno){                  
                 return ($element->getturno() == $turno );
             
             
             });// filter

             break;
             
         }
         
     }

     return $empleadosturno;
    
}

public static function EntregarTipo($todosh,$tipo){

    $empleadostipo = array();

    foreach ($todosh as $key => $value) {
                
        if($tipo == $value->gettipo()){           
                          
            $empleadostipo = array_filter($todosh,function($element)use($tipo){                  
                 return ($element->gettipo() == $tipo );
             
             
             });// filter

             break;
             
         }
         
     }

     return $empleadostipo;
    
}

}

?>