<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="jumbotron" style="margin-bottom: 0; padding: 1rem 3rem;">
        <h1 class="display-5">Ejercicio 2</h1>
        <p class="lead">
            Escribe un programa en php con un formulario para que el usuario pueda introducir un número. Al introducirlo:
        </p>
        <p>
            a. Invoque una función para que devuelva la <b>raíz cuadrada</b> de ese número. <span class="rojo">(0.5 puntos)</span><br>
            b. Invoque una función para que devuelva el <b>cubo</b> de ese número. <span class="rojo">(0.5 punto)</span><br>
            c. Invoque una función que reciba <b>por referencia</b> el número y lo modifique. Que pinte el número <b>antes</b> y <b>después</b> de entrar en la función. <span class="rojo">(1.5 puntos)</span><br>
        </p>
    </div>
    <div class="container justify-content-center mt-5">
        <?php
        $numero = $_POST["numero"];

        function raizcuadrada($num)
        {
            return round(sqrt($num),3);
        }
        function cubo($num)
        {
            return pow($num,3);
        }

        function modificar($num){
            return $num=$num+10;
        }

        echo '<div class="row">';
        echo 'El cuadrado de '.$numero.' es: ' . raizcuadrada($numero) . '<br>';
        echo '</div>';
        echo '<div class="row">';
        echo 'El cubo de '.$numero.' es: ' . cubo($numero) . '<br>';
        echo '</div>';
        echo '<div class="row">';
        echo 'El valor antes de modificarse es: ' .$numero . '<br>';
        echo '</div>';
        echo '<div class="row">';
        echo 'El valor despues de modificarse (sumarle 10) es: ' .$numMod=modificar($numero) . '<br>';
        echo '</div>';
        // echo '<div class="row">';
        // echo 'El valor despues de modificarse es: ' .$numMod . '<br>';
        // echo '</div>';               
        ?>        
    </div>
</body>

</html>