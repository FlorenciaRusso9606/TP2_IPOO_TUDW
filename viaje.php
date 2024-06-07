<?php

class Viaje{
    private $codigo_viaje;
    private $destino;
    private $cant_max_colPasajeros;
    private $colPasajeros;
    private $objResponsableV;
    private $costoViaje;
    private $costosAbonados;
    private $objEmpresa;

    public function __construct($codigo_viaje, $destino, $cant_max_colPasajeros, $colPasajeros, $objResponsableV, $costoViaje, $costosAbonados, $objEmpresa)
    {
        $this->codigo_viaje=$codigo_viaje;
        $this->destino=$destino;
        $this->cant_max_colPasajeros=$cant_max_colPasajeros;
        $this->colPasajeros=$colPasajeros;
        $this->objResponsableV=$objResponsableV;
        $this->costoViaje=$costoViaje;
        $this->costosAbonados=$costosAbonados;
        $this->objEmpresa = $objEmpresa;
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
    public function getobjResponsableV(){
        return $this->objResponsableV;
    }
    public function getCostoViaje(){
        return  $this->costoViaje;
    }
    public function getCostosAbonados(){
        return  $this->costosAbonados;
    }
    public function getObjEmpresa(){
        return  $this->objEmpresa;
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
    public function setobjResponsableV($objResponsableV){
        $this->objResponsableV = $objResponsableV;
    }
    public function setCostoViaje($costoViaje){
        $this->costoViaje = $costoViaje;
    }
    public function setCostosAbonados($costosAbonados){
        $this->costosAbonados = $costosAbonados;
    }
    public function setObjEmpresa($objEmpresa){
        $this->objEmpresa = $objEmpresa;
    }
    public function modificarViaje($codigo, $destino, $cantMax, $costoViaje){
        $this->setCodigoViaje($codigo);
        $this->setDestino($destino);
        $this->setCantMaxcolPasajeros($cantMax);
        $this->setCostoViaje($costoViaje);
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
        if(!$encontrado){
            $i=-1;
        };
        return $i;
    }
    /*public function cambiarDatosPasajero($numDocPasajero, $nuevoNombre, $nuevoApellido, $nuevoTelefono){
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
*/
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
    public function hayPasajesDisponible() {
        $hayLugar= false;
       if (count($this->getColPasajeros())<$this->getCantMaxcolPasajeros()){
        $hayLugar = true;
       }
       return $hayLugar;
    }
    public function venderPasaje($objPasajero){
        $hayLugar= $this->hayPasajesDisponible();
        $costoAAbonar=0;
        $cargado = false;
        if($hayLugar){
            $objPasajero->setNumAsiento(count($this->getcolPasajeros())+1);
            $cargado=$this->cargarPasajero($objPasajero);
           if($cargado == false){
                $costoAAbonar = $this->getCostoViaje() + ($this->getCostoViaje() * $objPasajero->darPorcentajeIncremento());
                $costosAbonados = $this->getCostosAbonados();
                $costosAbonados = $costosAbonados + $costoAAbonar;
                $this->setCostosAbonados($costosAbonados);
            }
        return $costoAAbonar;
    }
}
/**SE DEBE PONER COLPASAJEROS ACÁ? */
public function cargar($codViaje, $dest, $canMaxPas, $colPas,$respV, $costoViaje, $costosAb, $objEmp) {
    $this->setCodigoViaje($codViaje);
    $this->getDestino($dest);
    $this->setCantMaxcolPasajeros($canMaxPas);
    $this->setcolPasajeros($colPas);
    $this->setobjResponsableV($respV);
    $this->setCostoViaje($costoViaje);
    $this->setCostosAbonados($costosAb);
    $this->setObjEmpresa($objEmp);
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
        return "Código del viaje: " . $this->getCodigoViaje() . "\n" . "Destino: " . $this->getDestino() . "\n" . "Cantidad máxima de pasajeros: " . $this->getCantMaxcolPasajeros() . "\n" . "Responsable del viaje: " . $this->getobjResponsableV() . "\n" ."Pasajeros:\n" .$arrayPasajeros  . "\n";        
}

}
?>