<?php
class Empleado
{
    protected $nombre;
    protected $apellido1;
    protected $apellido2;
    protected $numeroSS;

    public function __construct($nombre, $apellido1, $apellido2, $numeroSS)
    {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->numeroSS = $numeroSS;
    }

    public function __set($atributo, $valor)
    {
        if (property_exists("Empleado", $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists("Empleado", $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function getNombreCompleto()
    {
        $nombreCompleto = "{$this->nombre} {$this->apellido1} {$this->apellido2}";
        return $nombreCompleto;
    }
}
