<?php
/** La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%*/
class PasajeroEstandar extends Pasajero{
    public function __construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket)
    {
        parent::__construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket);
    }
 
    public function darPorcentajeIncremento() {
        $incremento= 0.1;
        return $incremento;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.="Incremento: ". $this->darPorcentajeIncremento()."\n";
        return $cadena;
    }
}
?>