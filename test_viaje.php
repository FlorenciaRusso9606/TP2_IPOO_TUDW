<?php
include_once "Pasajero.php";
include_once "PasajeroVip.php";
include_once "PasajeroEstandar.php";
include_once "PasajeroEspecial.php";
include_once "ResponsableV.php";
include_once "Viaje.php";


echo "Ingrese el número de empleado del responsable del viaje:\n";
$numEmpleadoRV = trim(fgets(STDIN));
echo "Ingrese el número de licencia del responsable del viaje:\n";
$numLicenciaRV = trim(fgets(STDIN));
echo "Ingrese el nombre del responsable del viaje:\n";
$nombrerRV = trim(fgets(STDIN));
echo "Ingrese el apellido del responsable del viaje:\n";
$apellidoRV = trim(fgets(STDIN));
$responsable = new ResponsableV($numEmpleadoRV, $numLicenciaRV, $nombrerRV, $apellidoRV);
echo "Ingrese el código del viaje:\n";
$codigoV = trim(fgets(STDIN));
echo "Ingrese un destino:\n";
$destino = trim(fgets(STDIN));
echo "Ingrese la cantidad máxima de pasajeros:\n";
$cantMaxPasajeros = trim(fgets(STDIN));
echo "Ingrese el costo del viaje:\n";
$costoViaje = trim(fgets(STDIN));
echo "Datos de la empresa\n";
echo "Ingrese el ID de la empresa:\n";
$idEmpresa = trim(fgets(STDIN));
echo "Ingrese el nombre de la empresa:\n";
$nombreEmpresa = trim(fgets(STDIN));
echo "Ingrese la dirección de la empresa:\n";
$dirEmpresa = trim(fgets(STDIN));
$empresa = New Empresa ($idEmpresa, $nombreEmpresa, $dirEmpresa);
$pasajeros=[];
$viaje = new Viaje($codigoV, $destino, $cantMaxPasajeros, $pasajeros, $responsable, $costoViaje,0, $empresa);
$numTicket = 0;
$numAsiento = 0;
function modificarViaje($viaje, $eleccion){
    switch($eleccion){
        case 1:
            echo "Codigo actual: ".$viaje->getCodigoViaje()."\n";
            echo "Ingrese el nuevo código para cambiarlo: \n";
            $nuevoCodigo = trim(fgets(STDIN));
            $viaje->setCodigo($nuevoCodigo);
            echo "El código se cambió correctamente\n";
        break;
        case 2:
            echo "Destino actual: ".$viaje->getDestino()."\n";
            echo "Ingrese el nuevo destino para cambiarlo: \n";
            $nuevoDestino = trim(fgets(STDIN));
            $viaje->setDestino($nuevoDestino);
            echo "El destino se cambió correctamente\n";
        break;
        case 3:
            echo "Cantidad máxima actual de pasajeros: ".$viaje->getCantMaxcolPasajeros()."\n";
            echo "Ingrese la cantidad máxima de personas para cambiarla: \n";
            $nCantMaxPas = trim(fgets(STDIN));
            $viaje->setCantMaxcolPasajeros($nCantMaxPas);
            echo "La cantidad se cambió correctamente\n";
        break;
        case 4:
            echo "Qué información desea modificar del responsable del viaje?\n";
            echo "1- El número de empleado\n";
            echo "2- El número de licencia\n";
            echo "3- El nombre\n";
            echo "4- El apellido\n";
            echo "5- Todos los datos\n";
            $opcion = trim(fgets(STDIN));
            modificarResponsableViaje($viaje, $opcion);
        
        break;
        case 5:
            echo "Costo actual del viaje: ".$viaje->getCostoViaje()."\n";
            echo "Ingrese el costo del viaje para cambiarlo: \n";
            $nCostoViaje = trim(fgets(STDIN));
            $viaje->setCostoViaje($nCostoViaje);
            echo "El costo del viaje se cambió correctamente\n";
        break;
        case 6:
            echo "Qué información desea modificar de la empresa?\n";
            echo "1- El ID\n";
            echo "2- El nomnbre\n";
            echo "3- La dirección\n";
            echo "4- Todos los datos\n";
            $eleccion = trim(fgets(STDIN));
            modificarEmpresa($viaje, $eleccion);
            
        break;
        default:
            echo "Opción incorrecta, por favor ingrese una opción válida\n";
        break;

    }
}
function solicitarPasajero($viaje){
    echo "Ingrese el nombre del pasajero:\n";
    $nombrePasajero = trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero:\n";
    $apellidoPasajero = trim(fgets(STDIN));
    echo "Ingrese el número de documento del pasajero:\n";
    $numDocPasajero = trim(fgets(STDIN));
    echo "Ingrese el teléfono del pasajero:\n";
    $telPasajero = trim(fgets(STDIN));
    $numTicket = count($viaje->getcolPasajeros())+1;
    $numAsiento =  count($viaje->getcolPasajeros())+1;
    $nuevoPasajero = null;
    echo "Ingrese el tipo de ppasajero a cargar (estandar, vip, especial):\n";
    $tipoPasajero = trim(fgets(STDIN));
    if($tipoPasajero == "estandar"){
        $nuevoPasajero = new PasajeroEstandar($nombrePasajero, $apellidoPasajero, $numDocPasajero, $telPasajero, $numAsiento, $numTicket);
    }else if($tipoPasajero == "vip"){
        echo "Ingrese el número de viajero frecuente:\n";
        $numViajFrec = trim(fgets(STDIN));
        echo "Ingrese la cantidad de millas:\n";
        $cantMill = trim(fgets(STDIN));
        $nuevoPasajero = new PasajeroVIP($nombrePasajero, $apellidoPasajero, $numDocPasajero, $telPasajero, $numAsiento, $numTicket, $numViajFrec, $cantMill);
    }else{
        echo "El pasajero necesita silla de ruedas?:\n";
        $silla= trim(fgets(STDIN));
        echo "El pasajero necesita asistencia al pasajero?:\n";
        $asistencia = trim(fgets(STDIN));
        echo "El pasajero necesita comida especial?:\n";
        $comida = trim(fgets(STDIN));
        $nuevoPasajero = new PasajeroEspecial($nombrePasajero, $apellidoPasajero, $numDocPasajero, $telPasajero, $numAsiento, $numTicket, $silla, $asistencia, $comida);
    }
   $cargado = $viaje->cargarPasajero($nuevoPasajero);
    if ($cargado == true) {
        echo "El pasajero no ha podido ser cargado. Puede ser que el pasajero ya haya sido cargado o que el viaje haya completado la cantidad máxima de pasajeros.\n";
    } else {
        echo "El pasajero se cargó con éxito.\n";
    }
}
function modificarResponsableViaje($viaje, $opcion){
    switch($opcion){
        case 1:
            echo $viaje->getobjResponsableV()->getNumEmpleado() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumEmpleado($nuevoNumEmpleado);
            echo "Se cambió correctamente a " . $viaje->responsable->getNumEmpleado() . "\n";
        break;
        case 2:
            echo $viaje->getobjResponsableV()->getNumLicencia() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumLicencia($nuevoNumLicencia);
            echo "Se cambió correctamente a " . $viaje->responsable->getNumLicencia() . "\n";
        break;
        case 3:
            echo $viaje->getobjResponsableV()->getNombre() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNombre($nuevoNombre);
            echo "Se cambió correctamente a " . $viaje->getobjResponsableV()->getNombre() . "\n";
        break;
        case 4:
            echo $viaje->getobjResponsableV()->getApellido() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumLicencia($nuevoApellido);
            echo "Se cambió correctamente a " . $viaje->getobjResponsableV()->getApellido() . "\n";
        break;
        case 5:
            echo $viaje->getobjResponsableV()->getNumEmpleado() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumEmpleado($nuevoNumEmpleado);
            echo "Se cambió correctamente a " . $viaje->responsable->getNumEmpleado() . "\n";
        
            echo $viaje->getobjResponsableV()->getNumLicencia() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumLicencia($nuevoNumLicencia);
            echo "Se cambió correctamente a " . $viaje->responsable->getNumLicencia() . "\n";
            
            echo $viaje->getobjResponsableV()->getNombre() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNombre($nuevoNombre);
            echo "Se cambió correctamente a " . $viaje->getobjResponsableV()->getNombre() . "\n";

            echo $viaje->getobjResponsableV()->getApellido() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumLicencia($nuevoApellido);
            echo "Se cambió correctamente a " . $viaje->getobjResponsableV()->getApellido() . "\n";
        break;
        default:
            echo "Opción incorrecta, por favor ingrese una opción válida\n";
        break;
    }
}
function modificarEmpresa($viaje, $eleccion){
    switch($eleccion){
        case 1:
            echo "El ID actual de la empresa es ". $viaje->objEmpresa->getId()."\n";
            echo "Se cambiará a :\n";
            $nuevoIdEmpresa = trim(fgets(STDIN));
            $viaje->objEmpresa->setId($nuevoIdEmpresa);
            echo "El ID de la empresa se cambió correctamente\n";
        break;
        case 2:
            echo "El nombre actual de la empresa es ". $viaje->objEmpresa->getNombre()."\n";
            echo "Se cambiará a :\n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->objEmpresa->setNombre($nuevoNombre);
            echo "El nombre de la empresa se cambió correctamente\n";
        break;
        case 3:
            echo "La dirección actual de la empresa es ". $viaje->objEmpresa->getDireccion()."\n";
            echo "Se cambiará a :\n";
            $nuevaDir = trim(fgets(STDIN));
            $viaje->objEmpresa->setDireccion($nuevaDir);
            echo "La dirección de la empresa se cambió correctamente\n";
        break;
        case 4:
            echo "El ID actual de la empresa es ". $viaje->objEmpresa->getId()."\n";
            echo "Se cambiará a :\n";
            $nuevoIdEmpresa = trim(fgets(STDIN));
            $viaje->objEmpresa->setId($nuevoIdEmpresa);
            echo "El nuevo ID de la empresa se cambió correctamente\n";

            echo "El nombre actual de la empresa es ". $viaje->objEmpresa->getNombre()."\n";
            echo "Se cambiará a :\n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->objEmpresa->setNombre($nuevoNombre);
            echo "El nombre de la empresa se cambió correctamente\n";

            echo "La dirección actual de la empresa es ". $viaje->objEmpresa->getDireccion()."\n";
            echo "Se cambiará a :\n";
            $nuevaDir = trim(fgets(STDIN));
            $viaje->objEmpresa->setDireccion($nuevaDir);
            echo "La dirección de la empresa se cambió correctamente\n";
        break;
    }
}
do {
    echo "Menu:" . "\n" .
        "1- Cargar pasajero" . "\n" .
        "2- Modificar información de pasajero" . "\n" .
        "3- Ver la información del viaje" . "\n" . 
        "4- Modificar la información del viaje" . "\n" . 
        "5- Salir" . "\n" .
        "Seleccione una opción:\n";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case "1":
            solicitarPasajero($viaje);           
            break;
        case "2":
            echo "Ingrese el número de documento del pasajero al que desea cambiarle los datos:\n";
            $numDocPasajero = trim(fgets(STDIN));
            $pasajeros= $viaje->getcolPasajeros();
            $pasajero =  $viaje->pasajeroEncontrado($numDocPasajero);
            if ($encontrado != -1) {
                $unPasajero = $pasajeros[$pasajero]; 
                echo "Qué dato quiere modificar?\n";
                echo "1- Nombre\n";
                echo "2- Apellido\n";
                echo "3- Número de teléfono\n";
                echo "4- Todos los datos \n";
                $eleccion = trim(fgets(STDIN));
                switch($eleccion){
                    case 1:
                        echo "El nombre actual es: ". $unPasajero->getNombre() . "\n";
                        echo "Se cambiará a: \n";
                        $nuevoNombre = trim(fgets(STDIN));
                        $unPasajero->setNombre($nuevoNombre);
                        echo "Se cambió correctamente a ". $unPasajero->getNombre() . "\n";
                    break;
                    case 2:
                        echo "El apellido actual es: ". $unPasajero->getApellido() . "\n";
                        echo "Se cambiará a: \n";
                        $nuevoApellido = trim(fgets(STDIN));
                        $unPasajero->setNombre($nuevoApellido);
                        echo "Se cambió correctamente a ". $unPasajero->getApellido() . "\n";
                    break;
                    case 3:
                        echo "El teléfono actual es: ". $unPasajero->getTelefono() . "\n";
                        echo "Se cambiará a: \n";
                        $nuevoTelefono = trim(fgets(STDIN));
                        $unPasajero->setTelefono($nuevoTelefono);
                        echo "Se cambió correctamente a ". $unPasajero->getTelefono() . "\n";
                    break;
                    case 4:
                        echo "El nombre actual es: ". $unPasajero->getNombre() . "\n";
                        echo "Se cambiará a: \n";
                        $nuevoNombre = trim(fgets(STDIN));
                        $unPasajero->setNombre($nuevoNombre);
                        echo "Se cambió correctamente a ". $unPasajero->getNombre() . "\n";
                        
                        echo "El apellido actual es: ". $unPasajero->getApellido() . "\n";
                        echo "Se cambiará a: \n";
                        $nuevoApellido = trim(fgets(STDIN));
                        $unPasajero->setNombre($nuevoApellido);
                        echo "Se cambió correctamente a ". $unPasajero->getApellido() . "\n";

                        echo "El teléfono actual es: ". $unPasajero->getTelefono() . "\n";
                        echo "Se cambiará a: \n";
                        $nuevoTelefono = trim(fgets(STDIN));
                        $unPasajero->setTelefono($nuevoTelefono);
                        echo "Se cambió correctamente a ". $unPasajero->getTelefono() . "\n";
                    break;
                    default: 
                    echo "Opción incorrecta, por favor ingrese una opción válida\n";
                    break;
                }
            }else {
                echo "No se encontró ningún pasajero con ese número de documento. Desea Cargarlo? \n";
                $respuesta=trim(fgets(STDIN));
                if($respuesta == "Si" || $respuesta == "si"){
                    $unPasajero = solicitarPasajero();
                }
            }
            break;
        case "3":
            echo $viaje;
        break;
        case "4":
            echo "¿Qué desea modificar del viaje?\n";
            echo "1- Cambiar código de viaje\n";
            echo "2- Cambiar destino\n";
            echo "3- Cambiar la cantidad máxima de pasajeros\n";
            echo "4- Cambiar el responsable del viaje\n";
            echo "5- Cambiar el costo del viaje\n";
            echo "6- Cambiar datos de la empresa\n";
            $eleccion = trim(fgets(STDIN));
            modificarViaje($viaje, $eleccion);
        break;
        case "5":
            echo "Saliendo...\n";
        break;
        default: 
            echo "La opción ingresada no es válida. Por favor, ingrese una opción válida.\n";
            break;
    }
} while ($opcion != "5")

?>