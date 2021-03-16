<?php

require_once('Carta.php');
require_once('IBarajaCartas.php');

abstract class Baraja implements IBarajaCartas
{
    protected $cartas;

    protected $posSigCarta;
    protected static $NUM_CARTAS = 40;

    protected $numCartasTotal;
    protected $numCartasPorPalo;

    public function __construct($cartas, $posSigCarta, $NUM_CARTAS, $numCartasTotal, $numCartasPorPalo)
    {
        $this->cartas = $cartas;
        $this->posSigCarta = $posSigCarta;
        $this->NUM_CARTAS = $NUM_CARTAS;
        $this->numCartasTotal = $numCartasTotal;
        $this->numCartasPorPalo = $numCartasPorPalo;
    }

    public function __set($atributo, $valor)
    {
        if (property_exists("Baraja", $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists("Baraja", $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function siguienteCarta()
    {
        if ($this->posSigCarta < $this->NUM_CARTAS) {
            $this->posSigCarta++;
            return $this->cartas[$this->posSigCarta];
        } else {
            return "No hay mas cartas <br>";
        }
    }

    public function cartasDisponibles()
    {
        return $this->NUM_CARTAS;
    }

    public function repartirCartas($cartasRepartidas)
    {
        if ($cartasRepartidas > $this->NUM_CARTAS) {
            return "No hay tantas cartas para repartir";
        } else {
            $repartir = array_slice($this->cartas, 0, $cartasRepartidas);
            for ($i = 0; $i < count($repartir); $i++) {
                unset($this->cartas[$i]);
            }
            $this->NUM_CARTAS = count($this->cartas);
            return $repartir;
        }
    }

    public function cartasRepartidas()
    {
        return $this->numCartasTotal - $this->NUM_CARTAS;
    }

    public function mostrarBaraja()
    {
        for ($i=0; $i < $this->NUM_CARTAS; $i++) {             
            if ($i%5==0) {
                echo '<tr>';
                echo '<td>'.$this->cartas[$i + ($this->numCartasTotal - $this->NUM_CARTAS)].'</td>';
            }else{
                echo '<td>'.$this->cartas[$i + ($this->numCartasTotal - $this->NUM_CARTAS)].'</td>';                                                            
            }
            
        }  
    }

    abstract public function barajar();

    abstract public function crearBaraja();

    public function compareTo(Baraja $b1, Baraja $b2)
    {
        if (get_class($b1) != get_class($b2)) {
            return "Las barajas introducidas son diferentes";
        } else {
            return "Las barajas introducidas son iguales (españolas o francesas)";
        }
    }
}


