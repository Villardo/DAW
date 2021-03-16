<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio POO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    require_once('Empleado.php');
    require_once('EmpleadoAsalariado.php');
    require_once('EmpleadoHoras.php');


    $empleadoA1 = new EmpleadoAsalariado("Cesar", "Fernandez", "Fernandez", 111111, 1.1, 15000);
    $empleadoA2 = new EmpleadoAsalariado("Victor", "Leon", "Barciela", 222222, 1.1, 20000);
    $arrayEAsalariado = array($empleadoA1, $empleadoA2);

    $empleadoH1 = new EmpleadoHoras("Jose", "Villar", "Corrales", 333333, 1.1, 15);
    $empleadoH1->horasTotalesMes=40;
    $empleadoH2 = new EmpleadoHoras("Hadrián", "Villar", "Cuadrado", 444444, 1.1, 20);
    $arrayEHoras = array($empleadoH1,$empleadoH2);
    

    echo "El empleado " . $empleadoA1->getNombreCompleto() . " es un empleado asalariado que cobra " . $empleadoA1->getSalarioMes() . " euros al mes.<br>";
    echo "El empleado " . $empleadoH1->getNombreCompleto() . " es un empleado contratado por horas que cobra " . $empleadoH1->getSalarioMes() . " euros al mes.<br>";
    echo "El empleado " . $empleadoA2->getNombreCompleto() . " es un empleado asalariado que cobra " . $empleadoA2->getSalarioMes() . " euros al mes.<br>";
    echo $empleadoH1->comparar($empleadoH1, $empleadoH2) . "<br>";
    echo $empleadoA1->comparar($empleadoA1, $empleadoA2) . "<br>"; 

    ?>

</body>

</html>