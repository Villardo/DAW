<?php

class Carta {
    private $numero;
    private $palo;
    
    function __construct($numero, $palo) {
        $this->numero = $numero;
        $this->palo = $palo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPalo() {
        return $this->palo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setPalo($palo) {
        $this->palo = $palo;
    }
    
    function toString(){
        return "La carta es el ".$this->numero." de ".$this->palo."<br>";
    }
    
}
