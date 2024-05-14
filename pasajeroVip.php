<?php
/** La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%*/
class PasajeroVIP extends Pasajero{
    private $numViajeroFrecuente;
    private $cantMillas;
    public function __construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket, $numViajeroFrecuente, $cantMillas)
    {
        parent::__construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket);
        $this->numViajeroFrecuente =$numViajeroFrecuente;
        $this->cantMillas =$cantMillas;
    }
    public function getNumViajFrec(){
        return  $this->numViajeroFrecuente;
    }
    public function getCantMillas(){
        return  $this->cantMillas;
    }
    public function setNumViajFrec($numViajeroFrecuente){
        $this->numViajeroFrecuente =$numViajeroFrecuente;
    }
    public function setCantMillas($cantMillas){
        $this->cantMillas =$cantMillas;
    }
    public function darPorcentajeIncremento() {
        $incremento = 0.35;
        if ($this->getCantMillas() > 300) {
            $incremento += 0.3;
        }
        return $incremento;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Número de viajero Frecuente: ". $this->getNumViajFrec() . "\n" .
        "Cantidad de millas: " . $this->getCantMillas() . "\n";
        return $cadena;
    }
}
?>