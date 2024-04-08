<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $num_doc;
    private $telefono;
    public function __construct($nombre, $apellido, $num_doc, $telefono)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->num_doc=$num_doc;
        $this->telefono=$telefono;
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
    public function nuevoNombre($nuevoNombre){
        $this->setNombre($nuevoNombre);
    }
     public function nuevoApellido($nuevoApellido){
        $this->apellido = $nuevoApellido;
    }
    public function nuevoTelefono($nuevoTelefono){
        $this->telefono = $nuevoTelefono;
    }
    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\n" . "Apellido: " . $this->getApellido() . "\n" . "Número de documento: " . $this->getNumDoc() . "\n" . "Teléfono: " . $this->getTelefono() . "\n";
    }
}

?>