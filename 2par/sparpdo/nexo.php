<?php

// VER IMAGENES SQL AL FINAL, QUE NO ME SALIÓ
// Guardar imágenes de cada gusto de helado en mysql
// tipo mediumblob para campo img en una tabla.
// o "para que ande" guardar en archivo de texto, y
// usar un campo path para la imagen (alambre)

// LA API rest cambia el nexo y lo estandariza

require_once "guia/AccesoDatos.php";

require_once "HeladoCarga.php";

require_once "ConsultarHelado.php";

require_once "ClienteCarga.php";

require_once "ConsultarCliente.php";

require_once "EmpleadoCarga.php";

require_once "ConsultarEmpleado.php";

require_once "LocalidadCarga.php";

require_once "ConsultarLocalidad.php";

require_once "LocalCarga.php";

// resuelvo consultar solo por localidad
// tal vez agregue el estado en el verano
require_once "ConsultarLocal.php";


require_once "AltaVenta.php";

require_once "AltaVentaConImagen.php";


$elcasoG = isset($_GET['caso']) ? $_GET['caso'] : NULL;

$elcasoP = isset($_POST['caso']) ? $_POST['caso'] : NULL;

//var_dump($elcasoG);

   
switch ($elcasoG) {
        
        case 'cargah':

        //            echo "Carga de helados <br><br>";

                 $unhelado = Helado::OBJHelado($_GET['Sabor'],$_GET['Tipo'],$_GET['precio'],$_GET['cantidad']);                 
                 
               echo "úlitmo ID agregado: " . $unhelado->InsertarHelado();
                 
            break;

            case 'cargac':

                $uncliente = Cliente::OBJCliente($_GET['nombre'],$_GET['nacionalidad'],$_GET['sexo'],$_GET['edad']);

                echo "úlitmo ID agregado: " . $uncliente->InsertarCliente();

            break;
            
            case 'cargae':

            $unempleado = Empleado::OBJEmpleado($_GET['nombre'],$_GET['tipo'],$_GET['turno']);

            echo "úlitmo ID agregado: " . $unempleado->InsertarEmpleado();

        break;

        case 'cargal':

            $unalocalidad = Localidad::OBJLocalidad($_GET['nombre'],$_GET['provincia'],$_GET['estado']);

            echo "úlitmo ID agregado: " . $unalocalidad->InsertarLocalidad();

        break;

        case 'cargall':

        // parametros
        $unlocal = Local::OBJLocal($_GET['direccion'],$_GET['idlocalidad'],$_GET['estado']);

        echo "úlitmo ID agregado: " . $unlocal->InsertarLocal();

    break;
    
       
}

switch ($elcasoP) {

        case 'consultah':    

        // diferenciar lo que entra

        // Del resultado de la comparacion

        $elsabor = isset($_POST['Sabor']) ? $_POST['Sabor'] : NULL;

        $eltipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : NULL;

        if (isset($elsabor) || isset($eltipo)){

            if (isset($elsabor) && isset($eltipo)){

          echo ( ConsultaHelado::ConsultarHelado($_POST['Sabor'],$_POST['Tipo']));

        }else{

            //var_dump($elsabor);
            //var_dump($eltipo);
            if(isset($elsabor)){

                // OK
                //var_dump($_POST['Sabor']);
                echo (ConsultaHelado::ConsultarHelado($_POST['Sabor']));
            }

            if(isset($eltipo)){

                echo (ConsultaHelado::ConsultarHelado("",$_POST['Tipo']));

            }
        }

    }
    
    break;

    case 'consultac': 
    
        // diferenciar lo que entra

        // Del resultado de la comparacion

        $lanacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : NULL;

        $elsexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;

        if (isset($lanacionalidad) || isset($elsexo)){

            if (isset($lanacionalidad) && isset($elsexo)){

        echo "<pre>";
          var_dump( ConsultaCliente::ConsultarCliente($_POST['nacionalidad'],$_POST['sexo']));
          echo "</pre>";

        }else{

            if(isset($lanacionalidad)){
                echo "<pre>";
                var_dump (ConsultaCliente::ConsultarCliente($_POST['nacionalidad']));
                echo "</pre>";
            }

            if(isset($elsexo)){
                echo "<pre>";
                var_dump (ConsultaCliente::ConsultarCliente("",$_POST['sexo']));
                echo "</pre>";
            }
        }

    }



    break;


    // turno y tipo.

    case 'consultae':    

    // diferenciar lo que entra

    // Del resultado de la comparacion

    $elturno = isset($_POST['turno']) ? $_POST['turno'] : NULL;

    $eltipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : NULL;

    

    

    if (isset($elturno) || isset($eltipo)){

        if (isset($elturno) && isset($eltipo)){

        echo "<pre>";
      var_dump (ConsultaEmpleado::ConsultarEmpleado($_POST['turno'],$_POST['Tipo']));
      echo "</pre>";
    }else{

        if(isset($elturno)){

            echo "<pre>";
            var_dump (ConsultaEmpleado::ConsultarEmpleado($_POST['turno']));
            echo "</pre>";
        }

        if(isset($eltipo)){

            echo "<pre>";
            var_dump (ConsultaEmpleado::ConsultarEmpleado("",$_POST['Tipo']));
            echo "</pre>";
        }
    }

}

break;

case 'consultal':

$elnombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;

$laprovincia = isset($_POST['provincia']) ? $_POST['provincia'] : NULL;

if (isset($elnombre) || isset($laprovincia)){

    if (isset($elnombre) && isset($laprovincia)){

    echo "<pre>";
  var_dump (ConsultaLocalidad::ConsultarLocalidad($_POST['nombre'],$_POST['provincia']));
  echo "</pre>";
}else{

    if(isset($elnombre)){

        echo "<pre>";
        var_dump (ConsultaLocalidad::ConsultarLocalidad($_POST['nombre']));
        echo "</pre>";
    }

    if(isset($laprovincia)){

        echo "<pre>";
        var_dump (ConsultaLocalidad::ConsultarLocalidad("",$_POST['provincia']));
        echo "</pre>";
    }
}

}
        
    break;

     case 'consultall':

$lalocalidad = isset($_POST['localidad']) ? $_POST['localidad'] : NULL;
  
    if(isset($lalocalidad)){

        echo "<pre>";
        var_dump (ConsultaLocal::ConsultarLocal($_POST['localidad']));
        echo "</pre>";
    }
       
    break;

    case 'altaventa':

    
    
    // si el helado existe, y hay stock, guardar la venta

    // llegan todos strings...
    //var_dump($_POST);

    if(Venta::Validar($_POST['idhelado'],$_POST['cantidad'])){

        $unaventa = Venta::OBJVenta($_POST['idlocal'],$_POST['idcliente'],$_POST['idempleado'],$_POST['idhelado'],$_POST['fecha'],$_POST['cantidad']);
        echo "úlitmo ID agregado: " . $unaventa->InsertarVenta();
    }else{
        echo "no pudo realizarse la venta en tiempo y forma";
    }

     // parametros


    break;

        
} // switch Post

?>