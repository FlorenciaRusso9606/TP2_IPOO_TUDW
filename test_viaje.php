<?php
include_once "pasajero.php";
include_once "pasajeroVip.php";
include_once "pasajeroEspecial.php";
include_once "responsableV.php";
include_once "viaje.php";
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
$pasajeros=[];
//public function __construct($codigo_viaje, $destino, $cant_max_colPasajeros, $colPasajeros, $objResponsableV, $costoViaje, $costosAbonados)
$viaje = new Viaje($codigoV, $destino, $cantMaxPasajeros, $pasajeros, $responsable, $costoViaje,0);
$numTicket = 0;
$numAsiento = 0;
do {
    echo "Menu:" . "\n" .
        "1- Cargar pasajero" . "\n" .
        "2- Modificar información de pasajero" . "\n" .
        "3- Ver la información del viaje" . "\n" . 
        "4- Modificar código de viaje" . "\n" . 
        "5- Modificar destino" . "\n" . 
        "6- Modificar cantidad máxima de pasajeros" . "\n" . 
        "7- Modificar la información del responsable del vuelo" . "\n" .
        "8- Salir" . "\n" .
        "Seleccione una opción:\n";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case "1":
            echo "Ingrese el nombre del pasajero:\n";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero:\n";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el número de documento del pasajero:\n";
            $numDocPasajero = trim(fgets(STDIN));
            echo "Ingrese el teléfono del pasajero:\n";
            $telPasajero = trim(fgets(STDIN));
            $numTicket = $numTicket+1;
            $numAsiento = $numAsiento+1;
            $nuevoPasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $numDocPasajero, $telPasajero, $numAsiento, $numTicket);
            $cargado = $viaje->cargarPasajero($nuevoPasajero);
            if ($cargado == true) {
                echo "El pasajero no ha podido ser cargado. Puede ser que el pasajero ya haya sido cargado o que el viaje haya completado la cantidad máxima de pasajeros.\n";
            } else {
                echo "El pasajero se cargó con éxito.\n";
            }

            break;
        case "2":
            echo "Ingrese el número de documento del pasajero al que desea cambiarle los datos:\n";
            $numDocPasajero = trim(fgets(STDIN));
            $encontrado =  $viaje->pasajeroEncontrado($numDocPasajero);
            if ($encontrado == true) {
                echo "Ingrese el nuevo nombre del pasajero:\n";
                $nuevoNombre = trim(fgets(STDIN));
                echo "Ingrese el nuevo apellido del pasajero:\n";
                $nuevoApellido = trim(fgets(STDIN));
                echo "Ingrese el nuevo teléfono del pasajero:\n";
                $nuevoTelefono = trim(fgets(STDIN));
                $viaje->cambiarDatosPasajero($numDocPasajero, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
                $pasajeros = $viaje->getcolPasajeros();
                $i = 0;
                $encontrado = false;
                while ($i < count($pasajeros) && $encontrado == false) {
                    if ($pasajeros[$i]->getNumDoc()== $numDocPasajero) {
                        echo "Nombre del pasajero: " . $pasajeros[$i]->getNombre() . "\n" .
                            "Apellido del pasajero: " . $pasajeros[$i]->getApellido() . "\n" .
                            "Número de documento del pasajero: " . $pasajeros[$i]->getNumDoc() . "\n" .
                            "Número de teléfono del pasajero: " . $pasajeros[$i]->getTelefono() . "\n";
                            $encontrado = true;
                    }
                    $i++;
                }
            }
                 else {
                echo "No se encontró ningún pasajero con ese número de documento.\n";
            }
            break;
        case "3":
            echo $viaje;
        break;
        case "4":
            echo "Ingrese el nuevo código de viaje:\n";
            $nuevoCodigoViaje = trim(fgets(STDIN));
            $viaje->setCodigoViaje($nuevoCodigoViaje);
        break;
        case "5":
            echo "Ingrese el nuevo destino:\n";
            $nuevoDestion = trim(fgets(STDIN));
            $viaje->setDestino($nuevoDestion);
        break;
        case "6":
            echo "Ingrese la nueva cantidad máxima de pasajeros:\n";
            $nuevaCantMaxPasajeros = trim(fgets(STDIN));
            $viaje->setCantMaxcolPasajeros($nuevaCantMaxPasajeros);
        break;
        case "7":
            echo "Ingrese el nuevo número de empleado del responsable del viaje:\n";
            $nuevoNumEmpleadoRV = trim(fgets(STDIN));
            echo "Ingrese el nuevo número de licencia del responsable del viaje:\n";
            $nuevoNumLicenciaRV = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre del responsable del viaje:\n";
            $nuevoNombrerRV = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido del responsable del viaje:\n";
            $nuevoApellidoRV = trim(fgets(STDIN));
            $viaje->getobjResponsableV()->setNumEmpleado($nuevoNumEmpleadoRV);
            $viaje->getobjResponsableV()->setNumLicencia($nuevoNumLicenciaRV);
            $viaje->getobjResponsableV()->setNombre($nuevoNombrerRV);
            $viaje->getobjResponsableV()->setApellido($nuevoApellidoRV);
        break;
        case "8":
            echo "Saliendo...\n";
        break;
        default: 
            echo "La opción ingresada no es válida. Por favor, ingrese una opción válida.\n";
            break;
    }
} while ($opcion != "8")

?>