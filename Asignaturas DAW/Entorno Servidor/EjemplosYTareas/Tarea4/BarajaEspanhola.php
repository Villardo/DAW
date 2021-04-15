<?php

require_once './Baraja.php';

class BarajaEspanhola extends Baraja {

    protected $incluir8y9 = false;

    public function crearBaraja() {
        if ($this->incluir8y9) {
            self::$NUM_CARTAS = 48;
        } else {
            self::$NUM_CARTAS = 40;
        }
        $numerosPorPalo = self::$NUM_CARTAS / 4;

        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "ESPADAS"));
        }
        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "BASTOS"));
        }
        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "OROS"));
        }
        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "COPAS"));
        }
    }

    function getIncluir8y9() {
        return $this->incluir8y9;
    }

    function setIncluir8y9($incluir8y9) {
        $this->incluir8y9 = $incluir8y9;
    }
    
    public function compareTo($baraja) {
        if ($baraja instanceof BarajaEspanhola) {
            echo "Las dos barajas son españolas";
        }
        else
        {
            echo "Las barajas son diferentes";
        }
    }    

}
