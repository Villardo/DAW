<?php
require_once('Baraja.php');

class BarajaEs extends Baraja
{
    protected $flag8y9;
    // protected $coordsSprite;

    public function __construct($cartas, $posSigCarta, $NUM_CARTAS, $flag8y9, $numCartasTotal, $numCartasPorPalo)
    {
        $this->flag8y9 = $flag8y9;
        parent::__construct($cartas, $posSigCarta, $NUM_CARTAS, $numCartasTotal, $numCartasPorPalo);
    }

    public function crearBaraja()
    {
        $this->cartas = array();
        $palos = array(
            'O' => 'Oros',
            'C' => 'Copas',
            'E' => 'Espadas',
            'B' => 'Bastos'
        );
        if ($this->flag8y9) {
            $this->NUM_CARTAS = 48;
            $numeros = array(
                '1' => 'As',
                '2' => 'Dos',
                '3' => 'Tres',
                '4' => 'Cuatro',
                '5' => 'Cinco',
                '6' => 'Seis',
                '7' => 'Siete',
                '8' => 'Ocho',
                '9' => 'Nueve',
                '10' => 'Sota',
                '11' => 'Caballo',
                '12' => 'Rey',
            );
        } else {
            $this->NUM_CARTAS = 40;
            $numeros = array(
                '1' => 'As',
                '2' => 'Dos',
                '3' => 'Tres',
                '4' => 'Cuatro',
                '5' => 'Cinco',
                '6' => 'Seis',
                '7' => 'Siete',
                '10' => 'Sota',
                '11' => 'Caballo',
                '12' => 'Rey',
            );
        }

        foreach ($palos as $palo) {
            foreach ($numeros as $numero) {
                $carta = new Carta($palo, $numero);
                array_push($this->cartas, $carta);
            }
        }
        echo '<img src=' . "images/imagenesp.png " . ' alt="Baraja española creada" style=" width:80%">';
    }

    public function barajar()
    {
        $keys = (array)$this->cartas;
        shuffle($keys);
        echo '<p class="alert-heading">Barajando las cartas (españolas)</p>';
        return $this->cartas = $keys;
    }
}
