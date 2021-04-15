<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tarea 6 - Ficha receta</title>
    
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

    <!-- recursos-->
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <?php 

    if (array_key_exists('receta', $_GET)) {
        $cod_receta = $_GET['receta'];
    }

    require_once('conectarBD.php'); 

    echo '<div class="container" id="fondo">';
        echo '<div class="row" id="ficha_receta">';
            $res_query = mysqli_query(
                $db,
                "SELECT receta.nombre as nombre_receta, chef.nombre as nombre_chef,chef.apellido1 as apellido1_chef, chef.apellido2 as apellido2_chef, grupo.nombre as nombre_grupo, receta.dificultad as dificultad, receta.tiempo as tiempo, receta.elaboración as elaboracion 
                    FROM receta 
                    INNER JOIN chef ON (receta.cod_chef = chef.codigo) 
                    INNER JOIN grupo ON (receta.cod_grupo = grupo.codigo) 
                    WHERE receta.codigo = $cod_receta"
            );
            while ($row = mysqli_fetch_array($res_query)) {

            echo '<table class="table bg-white table-bordered mt-5" style="width:100%">';
            echo '<th colspan=3 class="table-dark text-light text-center">';
                echo '<h2>Ficha de la receta</h2>';
            echo '</th>';
                    echo '<tr>';
                        echo '<td><b>Receta</b>: ' . $row['nombre_receta'] . '</td>';
                        echo '<td colspan=2><b>Chef</b>: ' . $row['nombre_chef'] .' '. $row['apellido1_chef'].' '. $row['apellido2_chef'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Grupo</b>: ' . $row['nombre_grupo'] . '</td>';
                        echo '<td><b>Dificultad</b>: ' . $row['dificultad'] . '</td>';
                        echo '<td><b>Tiempo</b>: ' . $row['tiempo'] . ' minutos</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td colspan=3><b>Elaboración</b>: <br>' . $row['elaboracion'] . '</td>';
                    echo '</tr>';
            
            echo '</table>';
            }
        echo '</div>';

        echo '<div class="row" id="ingredientes">';
            $res_query = mysqli_query(
                $db,
                "SELECT ingrediente.nombre as ingrediente, receta_ingrediente.cantidad as cantidad, receta_ingrediente.medida as medida 
                FROM `receta_ingrediente` 
                INNER JOIN receta ON (receta.codigo = receta_ingrediente.cod_receta) 
                INNER JOIN ingrediente ON (receta_ingrediente.cod_ingrediente = ingrediente.codigo) 
                WHERE receta.codigo = $cod_receta"
            );
            echo '<table class="table bg-white table-bordered mt-2" style="width:50%">';   
            echo '<th colspan=2 class="table-dark text-light text-center">';
                echo '<h2>Ingredientes de la receta</h2>';
            echo '</th>';   
                while ($row = mysqli_fetch_array($res_query)) {
                    echo '<tr>';
                        echo '<td><b>' . $row['ingrediente'] .'</b>: '. $row['cantidad'] . ' ' . $row['medida'] . '</td>';
                    echo '</tr>';
                }               
            echo '</table>';
        echo '</div>';
    echo '</div>';
    ?>
</body>

</html>