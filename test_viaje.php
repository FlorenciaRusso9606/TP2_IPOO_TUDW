<?php
include "viaje.php";
$responsable = new ResponsableV("467", "558", "John1", "Ogonowski");
$pasajero1= new Pasajero("Florencia", "Russo", 15123456, 123567);
$pasajero2= new Pasajero ("Nicolás", "Flores", 15456789, 123869);
$pasajeros = [$pasajero1, $pasajero2];
$viaje = new Viaje("011", "Newa York", 158, $pasajeros, $responsable);

do {
    echo "Menu:" . "\n" .
        "1- Cargar pasajero" . "\n" .
        "2- Modificar información de pasajero" . "\n" .
        "3- Ver la información del viaje" . "\n" . 
        "4- Salir" . "\n" .
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
            $nuevoPasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $numDocPasajero, $telPasajero);
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
            echo "Saliendo...\n";
        break;
        default: 
            echo "La opción ingresada no es válida. Por favor, ingrese una opción válida.\n";
            break;
    }
} while ($opcion != "4")

?>