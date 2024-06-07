<?php
/** La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias. Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.*/
class PasajeroEspecial extends Pasajero{
    private $requiereSillaRuedas ;
    private $requiereAsistencia;
    private $requiereComidaEspecial;
    public function __construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket, $requiereSillaRuedas, $requiereAsistencia, $requiereComidaEspecial)
    {
        parent::__construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket);
        $this->requiereSillaRuedas =$requiereSillaRuedas;
        $this->requiereAsistencia =$requiereAsistencia;
        $this->requiereComidaEspecial =$requiereComidaEspecial;
    }
    public function getSillaRuedas(){
        return  $this->requiereSillaRuedas;
    }
    public function getAsistencia(){
        return  $this->requiereAsistencia;
    }
    public function getComidaEspecial(){
        return  $this->requiereComidaEspecial;
    }
    public function setSillaRuedas($requiereSillaRuedas){
        $this->requiereSillaRuedas =$requiereSillaRuedas;
    }
    public function setAsistencia($requiereAsistencia){
        $this->requiereAsistencia =$requiereAsistencia;
    }
    public function setComidaEspecial($requiereComidaEspecial){
        $this->requiereComidaEspecial =$requiereComidaEspecial;
    }
    public function darPorcentajeIncremento() {
        $incremento =0;
        if ($this->getSillaRuedas() && $this->getAsistencia() && $this->getComidaEspecial()) {
            $incremento= 0.3;
        } elseif ($this->getSillaRuedas() || $this->getAsistencia() || $this->getComidaEspecial()) {
            $incremento= 0.15;         
        }
        return $incremento;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Requiere Silla de ruedas: ". ($this->getSillaRuedas()? "Si" : "No") . "\n" .
        "Requiere asistencia de embarque o desembarque: ". ($this->getAsistencia()? "Si" : "No") . "\n" .
        "Requiere comida especial: ". ($this->getSillaRuedas()? "Si" : "No" ). "\n" ;
        return $cadena;
    }
}
?>