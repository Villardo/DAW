<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tarea 6</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

    <!-- recursos-->
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="js/index.js"></script>    
    
</head>

<body>        
    <?php
        $numRegistros = 8; 
        $pagina = 1; 

        if (array_key_exists('pag', $_GET)) {
            $pagina = $_GET['pag'];
        }

        require_once('conectarBD.php');

        $res_query = mysqli_query(
            $db,
            "SELECT * FROM receta"
        );
        $total_registros = mysqli_num_rows($res_query);

        $totalPaginas = ceil($total_registros / $numRegistros);

        $res_query = mysqli_query(
            $db,
            "SELECT receta.nombre as receta, chef.nombre as chef, receta.codigo as codigo 
                FROM receta 
                INNER JOIN chef ON (receta.cod_chef = chef.codigo)
                LIMIT " . (($pagina - 1) * $numRegistros) . ", $numRegistros "
        );
        echo '<div class="container" id="fondo">';
            echo '<div class="row">';
                echo '<table class="table bg-white table-bordered mt-5" style="width:100%">';
                echo '<th colspan=3 class="table-dark text-light text-center">'; 
                    echo '<h1>RECETAS</h1>';
                echo '</th>';
                    echo '<tr class="table-success font-weight-bold">';             
                        echo '<td>RECETA</td>';         
                        echo '<td colspan=2>CHEF</td>';            
                        
                    echo '</tr>';
                
                while ($row = mysqli_fetch_array($res_query)) {
                    echo '<tr>';
                        echo '<td>' . $row['receta'] . '</td>';
                        echo '<td>' . $row['chef'] . '</td>';
                        echo '<td> <a href="fichaReceta.php?receta='.$row['codigo'].'">Mas información</a> </td>';
                    echo '</tr>';
                }                
                echo '</table>';              
            echo '</div>';

            echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination justify-content-center">';
                    for ($i = 0; $i < $totalPaginas; $i++) {
                        if(($i + 1)== $pagina){
                            echo '<li class="page-item active"><a class="page-link" href="listadoRecetas.php?pag=' . ($i + 1) . '">'. ($i + 1) .'</a></li>';                       
                        }else{
                            echo '<li class="page-item"><a class="page-link" href="listadoRecetas.php?pag=' . ($i + 1) . '">'. ($i + 1) .'</a></li>';                       
                        }
                    }                    
                echo '</ul>';
            echo '</nav>';
        echo '</div>';
        ?>
    </div>
</body>

</html>