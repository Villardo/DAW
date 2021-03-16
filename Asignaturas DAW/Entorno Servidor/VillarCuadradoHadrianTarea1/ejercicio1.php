<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
    <?php
    echo '<div class="alert alert-success" role="alert">';
    echo '<h4 class="alert-heading">Resultado:</h4>';
    echo '<p>';
    $suma = 0;
    echo 'Los valores que has introducido son: ';
    // $_POST["num"]. Es el array de inputs generado en el formulario HTML
    foreach ($_POST["num"] as $clave => $valor) {
        if ($clave == (count($_POST["num"]) - 1)) {
            echo $valor . ".<br>";
        } else {
            echo $valor . ", ";
        }
        // $suma. Es la suma de todos los valores del array de inputs que se generan dinámicamente mediante jQuery.
        $suma += $valor;
        // $media. Es la suma de todos los valores del array, dividido entre el total de elementos del array.
        $media = $suma / count($_POST["num"]);
    }
    echo '</p>';
    echo '<hr>';
    echo '<p>';
    echo 'La suma de los valores es: ' . $suma . '<br>';
    echo '</p>';
    echo '<p>';
    echo 'La media de los valores es: ' . round($media, 2) . '<br>';
    echo '</p>';
    echo '<p>';
    echo 'El valor mas grande es: ' . max($_POST["num"]) . '<br>';
    echo '</p>';
    echo '<p>';
    echo 'El valor mas pequeño es: ' . min($_POST["num"]) . '<br>';
    echo '</p>';
    echo '</div>';
    ?>

</body>

</html>