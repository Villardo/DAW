<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mina.css">
</head>

<body>

    <?php
    echo '<div class="jumbotron" style="margin-bottom: 0; padding: 2rem 2rem;">';
    echo '<h1 class="display-8">Ejercicio 3</h1>';
    echo '<p class="lead">Utiliza matrices para crear y almacenar un campo de minas en una cuadrícula de 20 x 20.</p>';
    echo '</div>';
    ?>

    <div>
        <?php
        $x = [];
        $y = [];
        $y = array_pad($y, 20, ".");
        $x = array_pad($x, 20, $y);

        $matriz = $x;

        for ($i = 0; $i < 10; $i++) {
            $fila = rand(0, 19);
            $columna = rand(0, 19);

            $matriz[$fila][$columna] = "*";
        }

        ?>
        <div class="container" style="
            display: flex;
            justify-content: center;">
            <div class="col-6">
                <table class="table table-bordered table-sm table-dark mt-2">
                    <tr class="bg-info">
                        <th class="text-center" colspan="21">Campo de minas</th>
                    </tr>
                    <tr>
                        <td class="text-center">0</td>
                        <?php
                        foreach ($matriz as $clave => $valor) {
                            echo "<td class='text-center' style='width: 20%;'> " . ($clave + 1) . "</td>";
                        }
                        ?>
                    </tr>
                    <?php
                    foreach ($matriz as $clave => $valor) {
                        echo "<tr>";
                        echo "<td class='text-center'> " . ($clave + 1) . "</td>";
                        foreach ($valor as $key => $value) {
                            if (strcmp($value, "*") == 0) {
                                echo '<td class="text-center bg-danger mina">' . $value . '</td>';
                            } else {
                                echo '<td class="text-center">' . $value . '</td>';
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-sm table-dark mt-2">
                    <tr class="bg-primary">
                        <th class="text-center" colspan="3">Posición de las minas</th>
                    </tr>
                    <tr class="bg-info">
                        <td class="text-center"></td>
                        <td class="text-center">EJE X</td>
                        <td class="text-center">EJE Y</td>
                    </tr>
                    <?php
                    foreach ($matriz as $clave => $valor) {
                        foreach ($valor as $key => $value) {
                            if (strcmp($value, "*") == 0) {
                                echo "<tr>";
                                echo '<td class="text-center"> Posición </td>';
                                echo '<td class="text-center">' . $clave + 1 . '</td>';
                                echo '<td class="text-center">' . $key + 1 . '</td>';
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="container" style="
            display: flex;
            justify-content: center;
            align-items: center;">
            <form method="POST" action="#">
                <input type="submit" name="button1" class="btn btn-info btn-lg btn-block" value="Colocar minas" />
            </form>
        </div>

    </div>
</body>

</html>