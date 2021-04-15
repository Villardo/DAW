<?php

require_once './Carta.php';
require_once './BarajaCartas.php';

abstract class Baraja implements BarajaCartas {

    protected $cartas = array();
    protected $posSiguienteCarta = 0;
    protected static $NUM_CARTAS = 40;

    function __construct() {
        
    }

    function getCartas() {
        return $this->cartas;
    }

    function getPosSiguienteCarta() {
        return $this->posSiguienteCarta;
    }

    static function getNUM_CARTAS() {
        return self::$NUM_CARTAS;
    }

    function setCartas($cartas) {
        $this->cartas = $cartas;
    }

    function setPosSiguienteCarta($posSiguienteCarta) {
        $this->posSiguienteCarta = $posSiguienteCarta;
    }

    static function setNUM_CARTAS($NUM_CARTAS) {
        self::$NUM_CARTAS = $NUM_CARTAS;
    }

    protected function addCarta($unaCarta) {
        if ($unaCarta instanceof Carta) {
            $this->cartas[] = $unaCarta;
        }
    }
    
    abstract function crearBaraja();

    function barajar() {
        shuffle($this->cartas);
    }

    function siguienteCarta() {
        if ($this->posSiguienteCarta < self::$NUM_CARTAS) {
            echo $this->cartas[$this->posSiguienteCarta]->toString()."<br>";
            $this->posSiguienteCarta++;
        } else {
            return "No hay más cartas";
        }
    }

    function cartasDisponibles() {
        $numCartasDisponibles = self::$NUM_CARTAS - $this->posSiguienteCarta;
        echo "Se pueden repartir ".$numCartasDisponibles." cartas<br><br>";
    }

    function repartirCartas($cartasPedidas) {
        $cartasDisponibles = self::$NUM_CARTAS - $this->posSiguienteCarta;
        if ($cartasDisponibles > 0 && $cartasPedidas > 0 && $cartasDisponibles > $cartasPedidas) {
            for ($i = 0; $i < 4; $i++) {
                $this->siguienteCarta();
            }
        } else {
            return "No se pueden repartir las cartas";
        }
    }

    function cartasRepartidas() {
        for ($i = 0; $i < $this->posSiguienteCarta; $i++) {
            echo $this->cartas[$i]->toString();
        }
    }

    function mostrarBaraja() {
        echo "Mostrando baraja: INICIO <br>";
        for ($i = $this->posSiguienteCarta; $i < count($this->cartas); $i++) {
            echo $this->cartas[$i]->toString();
        }
        echo "Mostrando baraja: FIN <br><br>";
    }

}
