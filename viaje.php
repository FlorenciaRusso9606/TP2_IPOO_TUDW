<?php
/**
 * La empresa de Transporte de colPasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de colPasajeros y los colPasajeros del viaje. 
 * Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los colPasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los colPasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”. 
 * Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. 
 * Modificar la clase Viaje para que ahora los colPasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.
 * Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los colPasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */
include "pasajero.php";
include "responsableV.php";
class Viaje{
    private $codigo_viaje;
    private $destino;
    private $cant_max_colPasajeros;
    private $colPasajeros;
    private $responsableV;

    public function __construct($codigo_viaje, $destino, $cant_max_colPasajeros, $colPasajeros, $responsableV)
    {
        $this->codigo_viaje=$codigo_viaje;
        $this->destino=$destino;
        $this->cant_max_colPasajeros=$cant_max_colPasajeros;
        $this->colPasajeros=$colPasajeros;
        $this->responsableV=$responsableV;
    }
    public function getCodigoViaje(){
        return $this->codigo_viaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxcolPasajeros(){
        return $this->cant_max_colPasajeros;
    }
    public function getcolPasajeros(){
        return $this->colPasajeros;
    }
    public function getResponsableV(){
        return $this->responsableV;
    }
    public function setCodigoViaje($codigo_viaje){
        $this->codigo_viaje = $codigo_viaje;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setCantMaxcolPasajeros($cant_max_colPasajeros){
        $this->cant_max_colPasajeros = $cant_max_colPasajeros;
    }
    public function setcolPasajeros($colPasajeros){
        $this->colPasajeros = $colPasajeros;
    }
    public function setResponsableV($responsableV){
        $this->responsableV = $responsableV;
    }
    public function pasajeroEncontrado($pasajero){
        $pasajeros = $this->getcolPasajeros();
        $i=0;
        $encontrado = false;
        while($i<count($pasajeros) && $encontrado == false){
            if($pasajeros[$i]->getNumDoc() == $pasajero->getNumDoc()){
                $encontrado= true;
            }
            $i++;
        }
        return $encontrado;
    }
    public function cambiarDatosPasajero($numDocPasajero, $nuevoNombre, $nuevoApellido, $nuevoTelefono){
        $pasajeros = $this->getcolPasajeros();
        $i=0;
        while($i<count($pasajeros)){
            if($pasajeros[$i]->getNumDoc() == $numDocPasajero){
                $pasajeros[$i]->nuevoNombre($nuevoNombre);
                $pasajeros[$i]->nuevoApellido($nuevoApellido);
                $pasajeros[$i]->nuevoTelefono($nuevoTelefono);
            }
            $i++;
        }
    }
    public function cargarPasajero($pasajero){
        $i=0;
        $pasajeros = $this->getcolPasajeros();
        $cargado =$this->pasajeroEncontrado($pasajero);
        if(count($pasajeros)< $this->getCantMaxcolPasajeros()){
            while($i<count($pasajeros) && $cargado == false){
                if($pasajeros[$i]->getNumDoc() == $pasajero->getnumDoc()){
                    $cargado= true;
                }
                $i++;
            }if(!$cargado){
                $pasajeros[] = $pasajero;
            $this->setColPasajeros($pasajeros);

            }
            
        }else{
            $cargado= true;
        }
           return $cargado;
    }
    private function getStringArray($array){
        $cadena = "";
        foreach($array as $elemento){
            $cadena = $cadena . " " . $elemento . "\n";
        }
        return $cadena;
    }
     public function __toString()
     {
        $arrayPasajeros= $this->getStringArray($this->getcolPasajeros());
        return "Código del viaje: " . $this->getCodigoViaje() . "\n" . "Destino: " . $this->getDestino() . "\n" . "Cantidad máxima de pasajeros: " . $this->getCantMaxcolPasajeros() . "\n" . "Responsable del viaje: " . $this->getResponsableV() . "\n" ."Pasajeros:\n" .$arrayPasajeros  . "\n";        
}

}
?>