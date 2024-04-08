<?php
class ResponsableV{
        private $num_empleado;
        private $num_licencia;
        private $nombre;
        private $apellido;
    
        public function __construct($num_empleado, $num_licencia, $nombre, $apellido)
        {
            $this->num_empleado=$num_empleado;
            $this->num_licencia=$num_licencia;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
        }
        public function getNumEmpleado(){
            return $this->num_empleado;
        }
        public function getNumLicencia(){
            return $this->num_licencia;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function setNumEmpleado($num_empleado){
            $this->num_empleado = $num_empleado;
        }
        public function setNumLicencia($num_licencia){
            $this->num_licencia = $num_licencia;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        public function __toString()
        {
            return "Nombre: " . $this->getNombre() . "\n" . "Apellido: " . $this->getApellido() . "\n" . "Número de empleado: " . $this->getNumEmpleado() . "\n" . "Número de licencia: " . $this->getNumLicencia() . "\n";
        }
}

?>