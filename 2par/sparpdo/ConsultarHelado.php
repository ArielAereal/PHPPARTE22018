<?php

// accedemos a qu el sabor no es el ID, y que puede haber varios sabores
// de distintos tipos
// Ya arreglado (a mi manera)

// Falta diferenciar el DETALLE de que cuand la entrada es una,
// la salida es una...

//Revisado OK 17-06

class ConsultaHelado{

public static function ConsultarHelado($Sabor="",$Tipo=""){


    echo "consulta si hay helados <br><br>";

    $aliases = Helado::TraerTodosLosHelados();

    $todosh = array();
    //proceso

    foreach ($aliases as $key => $value) {
        

        $todosh[] = Helado::OBJHelado($value->sabor,$value->tipo,$value->Precio,$value->Cantidad,$value->idhelado);

    }

  

    $resul  = 0;

    $elsa;
    $elpo ="";

    /*echo "<pre>";
    var_dump($todosh);
    echo "</pre>";*/

        // diferenciar lo que entra

        // Del resultado de la comparacion

    $sabor = $Sabor != "" ? $Sabor : NULL;
    
    $tipo = $Tipo != "" ? $Tipo : NULL;

    // OK
    //var_dump($Sabor);

    //var_dump($sabor);

    if (isset($sabor) || isset($tipo)){

        // los dos
        if (isset($sabor) && isset($tipo)){        
         
        /*    echo "<pre>";
        var_dump($todosh);
        echo "</pre>";*/

        // pregunto por el Y sencillo
        foreach ($todosh as $key => $value) {

            if($sabor == $value->getSabor() && $tipo===$value->getTipo()){

             return "Conicide $sabor y $tipo";

             //return array_filter($todosh,function($element)use($nacionalidad,$sexo){                  
                //return ($element->getnacionalidad() == $nacionalidad && $element->getsexo() == $sexo);

             //});


            }
            
        }
            // sabor

          //  var_dump($sabor);

            foreach ($todosh as $key => $value) {
                
               //var_dump($value->getSabor());

                if($sabor == $value->getSabor()){

                    $resul = 1;
                    $elsa = $value;                   
                    }
                    
                }

            

           // echo ($resul);

            foreach ($todosh as $key => $value) {               
                
                if($tipo == $value->getTipo()){


                    if($resul == 1){

                        $resul = 2;                   
                    }else{
                        $resul = 1;
                    }

                    // entrada simple
                    break;
                    
                }

            }

            // coinciden los dos 
        } else {

            foreach ($todosh as $key => $value) {
                
                if($sabor == $value->getSabor()){


                    $resul++;
                    $elsa = $value;
                    break;
                }

            }

            foreach ($todosh as $key => $value) {
                
                if($tipo == $value->getTipo()){

                    $resul++;
                    $elpo = $value;
                    break;
                }

            }
     

    }
    
}// o tipo o sabor viene

    if($resul == 2){      

            return "Coincide $sabor pero $tipo coincide con otro sabor";

    }

    if($resul == 0){

        return "No coincide ni el sabor ni el tipo";

    }

    if($resul == 1){

        if(isset($elsa)){

            return "Coincide $sabor, pero no el tipo";

        }else{

            return "Coincide $tipo, pero no el sabor";

        }

    }

}// Metodo Consultar Helado
} // Clase Consulta Helado

?>