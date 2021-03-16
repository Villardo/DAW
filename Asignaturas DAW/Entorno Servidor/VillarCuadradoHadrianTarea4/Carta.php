<?php
class Carta
{
    protected $numero;    
    protected $palo;

    public function __construct($palo, $numero)
    {    
        $this->numero = $numero;
        $this->palo = $palo;
    }

    public function __set($atributo, $valor)
    {
        if (property_exists("Carta", $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists("Carta", $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function __toString()
    {
        return "{$this->numero} de {$this->palo} <br>";
    }
}
