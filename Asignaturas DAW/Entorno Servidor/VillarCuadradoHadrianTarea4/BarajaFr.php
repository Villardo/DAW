<?php
require_once('Baraja.php');


class BarajaFr extends Baraja
{
    // protected $coordsSprite;

    public function __construct($cartas, $posSigCarta, $NUM_CARTAS,$numCartasTotal,$numCartasPorPalo)
    {
        parent::__construct($cartas, $posSigCarta, $NUM_CARTAS,$numCartasTotal,$numCartasPorPalo);
    }

    public function crearBaraja()
    {
        $this->NUM_CARTAS= 52;
        $this->cartas = array();
        $palos = array(
            'T' => 'Tréboles',
            'C' => 'Corazones',
            'P' => 'Picas',
            'D' => 'Diamantes'
        );

        $numeros = array(
            'A' => 'As',
            '2' => 'Dos',
            '3' => 'Tres',
            '4' => 'Cuatro',
            '5' => 'Cinco',
            '6' => 'Seis',
            '7' => 'Siete',
            '8' => 'Ocho',
            '9' => 'Nueve',
            '10' => 'Diez',
            'J' => 'Sota',
            'Q' => 'Reina',
            'K' => 'Rey',
        );

        foreach ($palos as $palo) {
            foreach ($numeros as $numero) {
                $carta = new Carta($palo, $numero);
                array_push($this->cartas, $carta);
            }
        }
        echo '<img src=' . "images/imagenfr.png " . ' alt="Baraja francesa creada" style=" width:50%">';
    }

    public function barajar()
    {
        $keys = (array)$this->cartas;
        shuffle($keys);
        echo '<p class="alert-heading">Barajando las cartas (francesas)</p>';
        return $this->cartas=$keys;
    }
}
