<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
    <?php
    echo '<div class="jumbotron" style="margin-bottom: 0;">';
    echo '<h1 class="display-4">Ejercicio 2</h1>';
    echo '<p class="lead">Haya  una  variable $tabla_multiplicar donde  se  indique  la  tabla  de multiplicación que se quiere mostrar (Valores permitidos: Del 1 al 10).</p>';
    echo '<p>Cuando se ejecute el programa, se debe visualizar la tabla de multiplicar según la variable seleccionada</p>';
    echo '</div>';
    ?>
    <div class="container" style="
        display: flex;
        justify-content: center;
        align-items: center;">
        <div class="row">
            <div class="col-8">
                <table class="table table-lg table-dark mt-5">
                    <tr class="bg-primary">
                        <th class="text-center" colspan="5"><?php echo "La tabla del " . $_POST["numTabla"] ?></th>
                    </tr>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<tr>";
                        echo "<td>" . $_POST["numTabla"] . "</td>";
                        echo "<td> x </td>";
                        echo "<td> " . $i . " </td>";
                        echo "<td> = </td>";
                        $resultado = $i * $_POST["numTabla"];
                        echo "<td>" . $resultado . "</td>";
                        echo "<tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>