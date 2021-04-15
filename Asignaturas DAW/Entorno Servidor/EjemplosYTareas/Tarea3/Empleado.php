<?php

abstract class Empleado {

    private $nombre;
    private $apellido1;
    private $apellido2;
    private $NSS;
    protected $aumento;

    // constructor
    public function __construct($nombre, $apellido1, $apellido2, $NSS, $aumento) {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->NSS = $NSS;
        $this->aumento = $aumento;
    }

    public function __set($atributo, $valor) {
        if (property_exists(__CLASS__, $atributo)) {
            $this->$atributo = $valor;
        } else {
            echo "No existe el atributo $atributo.";
        }
    }

    public function __get($atributo) {
        if (property_exists(__CLASS__, $atributo)) {
            return $this->$atributo;
        }
        return NULL;
    }

    public function nombreCompleto() {
        return $this->nombre . ' ' . $this->apellido1 . ' ' . $this->apellido2;
    }

    // método abstracto sobrescrito por las subclases
    abstract public function salarioMes();

    abstract public function incrementarSalario();
}
?>

