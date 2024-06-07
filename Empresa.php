<?php
class Empresa {
    private $id;
    private $nombre;
    private $direccion;


    public function __construct($id, $nombre, $direccion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

  
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    
    public function __toString() {
        return "Empresa ID: " . $this->getId() . "\n" .
               "Nombre: " . $this->getNombre() . "\n" .
               "Dirección: " . $this->getDireccion() . "\n";
    }


public function cargar($id, $nombre, $direccion) {
    $this->setId($id);
    $this->setNombre($nombre);
    $this->setDireccion($direccion);
}

public function insertar(){
    $base=new BaseDatos();
    $resp= false;
    $consultaInsertar="INSERT INTO empresa(idempresa, enombre, edireccion,  email) 
            VALUES (".$this->getNrodoc().",'".$this->getApellido()."','".$this->getNombre()."','".$this->getEmail()."')";
    
    if($base->Iniciar()){

        if($base->Ejecutar($consultaInsertar)){

            $resp=  true;

        }	else {
                $this->setmensajeoperacion($base->getError());
                
        }

    } else {
            $this->setmensajeoperacion($base->getError());
        
    }
    return $resp;
}
}
?>
