<?php

require_once './BarajaEspanhola.php';
require_once './BarajaFrancesa.php';

echo "BARAJA ESPAÑOLA <br><br>";

//Creamos la baraja española
$baraja1 = new BarajaEspanhola();
$baraja1->crearBaraja();

//Barajamos
echo "METODO barajar() <br><br>";
$baraja1->barajar();

//Sacamos una carta
echo "METODO siguienteCarta() <br><br>";
$baraja1->siguienteCarta();

//Vemos cuantas cartas podemos repartir
echo "METODO cartasDisponibles() <br><br>";
echo $baraja1->cartasDisponibles();

//Repartimos 5 cartas
echo "METODO repartirCartas() <br><br>";
echo $baraja1->repartirCartas(5);

//Vemos cuantas cartas hemos repartido
echo "METODO cartasRepartidas() <br><br>";
echo $baraja1->cartasRepartidas();

//Mostramos la baraja
echo "METODO mostrarBaraja() <br><br>";
$baraja1->mostrarBaraja();

echo "BARAJA FRANCESA <br><br>";

//Creamos la baraja francesa
$baraja2 = new BarajaFrancesa();
$baraja2->crearBaraja();

//Barajamos
echo "METODO barajar() <br><br>";
$baraja2->barajar();

//Sacamos una carta
echo "METODO siguienteCarta() <br><br>";
$baraja2->siguienteCarta();

//Vemos cuantas cartas podemos repartir
echo "METODO cartasDisponibles() <br><br>";
echo $baraja2->cartasDisponibles();

//Repartimos 5 cartas
echo "METODO repartirCartas() <br><br>";
echo $baraja2->repartirCartas(5);

//Vemos cuantas cartas hemos repartido
echo "METODO cartasRepartidas() <br><br>";
echo $baraja2->cartasRepartidas();

//Mostramos la baraja
echo "METODO mostrarBaraja() <br><br>";
$baraja2->mostrarBaraja();

//Compararamos las dos barajas
echo "METODO compareTo() <br><br>";
$baraja1->compareTo($baraja2);
