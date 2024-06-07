<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $num_doc;
    private $telefono;
    private $numAsiento;
    private $numTicket;
    public function __construct($nombre, $apellido, $num_doc, $telefono,$numAsiento, $numTicket)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->num_doc=$num_doc;
        $this->telefono=$telefono;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }
    public function getNombre(){
        return $this->nombre;
    }
   
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumDoc(){
        return $this->num_doc;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getNumAsiento(){
        return  $this->numAsiento;
    }
    public function getNumTicket(){
        return  $this->numTicket;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setNumDoc($num_doc){
        $this->num_doc = $num_doc;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setNumAsiento($numAsiento){
        $this->numAsiento = $numAsiento;
    }
    public function setNumTicket($numTicket){
        $this->numTicket = $numTicket;
    }
    public function nuevoNombre($nuevoNombre){
        $this->setNombre($nuevoNombre);
    }
     public function nuevoApellido($nuevoApellido){
        $this->apellido = $nuevoApellido;
    }
    public function nuevoTelefono($nuevoTelefono){
        $this->telefono = $nuevoTelefono;
    }
    
    public function cargar($nom, $ap, $numDoc, $tel, $numAs, $numTicket) {
        $this->setNombre($nom);
        $this->setApellido($ap);
        $this->setNumDoc($numDoc);
        $this->setTelefono($tel);
        $this->setNumAsiento($numAs);
        $this->setNumTicket($numTicket);
    }
    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\n" . "Apellido: " . $this->getApellido() . "\n" . "Número de documento: " . $this->getNumDoc() . "\n" . "Teléfono: " . $this->getTelefono() . "\n". 
        "Número de asiento: " . $this->getNumAsiento() . "\n" . 
        "Número de ticket: " . $this->getNumTicket() . "\n";
    }
}

?>