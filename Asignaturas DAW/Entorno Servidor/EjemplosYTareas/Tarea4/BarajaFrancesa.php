<?php

require_once './Baraja.php';

class BarajaFrancesa extends Baraja {

    public function crearBaraja() {
        self::$NUM_CARTAS = 52;
        $numerosPorPalo = self::$NUM_CARTAS / 4;

        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "DIAMANTES"));
        }
        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "CORAZONES"));
        }
        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "TREBOLES"));
        }
        for ($i = 1; $i <= $numerosPorPalo; $i++) {
            $this->addCarta(new Carta($i, "PICAS"));
        }
    }

    public function compareTo($baraja) {
        if ($baraja instanceof BarajaFrancesa) {
            echo "Las dos barajas son francesas";
        } else {
            echo "Las barajas son diferentes";
        }
    }

}
