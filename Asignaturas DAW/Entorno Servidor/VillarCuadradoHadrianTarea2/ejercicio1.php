<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">
    <link rel="stylesheet" href="css/estilos.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="jumbotron" style="margin-bottom: 0; padding: 1rem 3rem;">
        <h1 class="display-5">Ejercicio 1</h1>
        <p class="lead">
            Escribe un programa PHP que, para cada número del 1 al 10:
        </p>
        <p>
            a. Invoque una función que muestre si el número es un número par o impar. <span class="rojo">(1 puntos)</span><br>
            b. Invoque una función que muestre si el número es un número primo. <span class="rojo">(1 punto)</span><br>
            c. Muestre esta información en una tabla HTML. <span class="rojo">(0.5 puntos)</span><br>
        </p>
    </div>
    <div class="container justify-content-center mt-3">
        <div class="row">
            <table class="table table-dark table-hover mt-2">
                <tr class="bg-primary">
                    <th class="text-center">Número</th>
                    <th class="text-center">Par o impar</th>
                    <th class="text-center">¿Es primo?</a></th>
                </tr>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    echo '<td class="text-center"> ' . $i . ' </td>';
                    parImpar($i);
                    $flag = comprobarPrimo($i);
                    if ($flag == 1) {
                        echo '<td class="text-center bg-success"><i class="bi bi-check"></i></td>';
                    } else {
                        if ($i == 1) {
                            echo '<td class="text-center bg-danger"><a href="https://es.wikipedia.org/wiki/N%C3%BAmero_primo#El_n%C3%BAmero_1_no_se_considera_primo"><i class="bi bi-x" style="color: white;"></a></td>';
                        } else {
                            echo '<td class="text-center bg-danger"><i class="bi bi-x"></i></td>';
                        }
                    }
                    echo "</tr>";
                }

                function parImpar($numero)
                {
                    if ($numero % 2 == 0) {
                        echo '<td class="text-center"> Par </td>';
                    } else {
                        echo '<td class="text-center"> Impar </td>';
                    }
                }

                function comprobarPrimo($numero)
                {
                    if ($numero == 1)
                        return 0;
                    for ($i = 2; $i <= $numero / 2; $i++) {
                        if ($numero % $i == 0)
                            return 0;
                    }
                    return 1;
                }

                function primo($numero)
                {
                    if ($numero == 1) {
                        echo '<td class="text-center"> <a href="https://es.wikipedia.org/wiki/N%C3%BAmero_primo#El_n%C3%BAmero_1_no_se_considera_primo">NO PRIMO</a> </td>';
                    } else {
                        for ($i = 2; $i <= $numero; $i++) {
                            if ($numero % $i == 0) {
                                echo '<td class="text-center"> NO PRIMO </td>';
                            } else {
                                echo '<td class="text-center"> PRIMO </td>';
                            }
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>