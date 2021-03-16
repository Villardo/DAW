<?php


function calculaRaiz($numero)
{
    return sqrt($numero);
}

function calculaCubo($numero)
{
    return pow($numero, 3);
}

//OJO AQUI! Unos cuantos habéis fallado en pasar argumentos por REFERENCIA
function modificaNumero(&$numero)
{
    $numero+=288;
}

$numero = 0;
if(isset($_POST['numero']))
{
    $numero = $_POST['numero'];
}

echo "El numero introducido es: ".$numero."<br>";
echo "La raiz de ese numero es: ".calculaRaiz($numero)."<br>";
echo "El cubo de ese numero es: ".calculaCubo($numero)."<br>";

echo "El numero antes de modificarlo por referencia es: ".$numero."<br>";
modificaNumero($numero);
echo "El numero despues de modificarlo por referencia es: ".$numero."<br>";
