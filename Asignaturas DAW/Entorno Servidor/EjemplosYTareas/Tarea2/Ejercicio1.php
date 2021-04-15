<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

function esPar($numero) {

    if ($numero % 2 == 0) {
        echo "<tr><td>" . $numero . " es PAR</td></tr>";
    } else {
        echo "<tr><td>" . $numero . " es IMPAR</td></tr>";
    }
}

function esPrimo($numero) {
    $contador = 0;

    for ($i = 2; $i <= $numero; $i++) {
        if ($numero % $i == 0) {
            if (++$contador > 1) {
                return false;
                echo "<tr><td>" . $numero . " NO es PRIMO</td></tr>";
            }
        }
    }
    if ($numero == 0 || $numero == 1) {
        return true;
    }
    return true;
}
?>
<table>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        esPar($i);
    }
    ?>
</table>
<br>
<table>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        if (esPrimo($i))
        {
            echo "<tr><td>" . $i . " es PRIMO</td></tr>";
        }
        else
        {
            echo "<tr><td>" . $i . " NO es PRIMO</td></tr>";
        }
    }
    ?>
</table>


