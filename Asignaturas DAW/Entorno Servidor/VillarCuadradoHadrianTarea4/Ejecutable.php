<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio POO 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <?php
        require_once('Carta.php');
        require_once('Baraja.php');
        require_once('BarajaEs.php');
        require_once('BarajaFr.php');

        ?>

        <div class="card text-light bg-dark text-center mt-5">
            <h3>
                Tarea 04 - Hadrián Villar Cuadrado
            </h3>
        </div>

        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn btn-secondary text-center" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <embed src="pdf/Tarea04.pdf" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>
            </div>
        </div>       

        <div>
            <?php

            // Creación de barajas            
            echo '<div class="card text-light bg-dark">';
                echo '<div class="row text-center align-items-center">';
                    echo '<div class="col-6">';
                        $bEspanhola = new BarajaEs("Cartas", 1, 48, true, 48, 12);            
                        $bEspanhola->crearBaraja();
                    echo '</div>';
                    echo '<div class="col-6">';
                        $bFrancesa = new BarajaFr("Cartas", 1, 52, 52, 13);
                        $bFrancesa->crearBaraja();
                    echo '</div>';
                echo '</div>';
                echo '<div class="row text-center align-items-center display-inline">';
                    echo '<div class="col-6">';
                        echo '<h5>Baraja española creada</h5>';
                    echo '</div>';
                    echo '<div class="col-6">';
                        echo '<h5>Baraja francesa creada</h5>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';            

            echo '<div class="container-fluid">';
                echo '<div class="row">';
                    echo '<div class="alert alert-success" role="alert" style="width:100%">';
                    //Barajar las cartas de las diferentes barajas
                    echo '<img class="float-left mr-3 ml-3 mt-2 text-center align-items-center" src=' . "images/barajar.png " . ' alt="Barajar" style="width:50px">';                    
                        $bEspanhola->barajar();
                        $bFrancesa->barajar();                
                    echo '</div>';                
                echo '</div>';
            echo '</div>';
            
            echo '<br>';

            echo '<table class="table text-light bg-dark text-center align-items-center">';
                echo '<thead class="thead-dark ">';
                echo '<tr>';                    
                    echo '<th scope="col">Carta posición 1</th>';
                    echo '<th scope="col">Carta posición 2</th>';
                    echo '<th scope="col">Siguiente carta (posición 2)</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                    echo '<tr>';                   
                    //Test cartas, siguiente carta
                    echo '<td>'. $bEspanhola->cartas[1] .'</td>';
                    echo '<td>'. $bEspanhola->cartas[2] .'</td>';
                    echo '<td>'. $bEspanhola->siguienteCarta().'</td>';
                    echo '</tr>';
                    echo '<tr>';
                echo '</tbody>';
            echo '</table> ';
        
            echo '<br>';
            
            //Método repartir cartas
            $cartasRep = $bEspanhola->repartirCartas(8);
            
            echo '<table class="table text-light bg-dark text-center align-items-center">';
                echo '<thead class="thead-dark">';
                echo '<tr>';
                    echo '<th colspan="5">Cartas repartidas</th>';                  
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';                
                    
                        for ($i=0; $i < count($cartasRep); $i++) { 
                            if ($i%5==0) {
                                echo '<tr>';
                                echo '<td>'.$cartasRep[$i].'</td>';
                            }else{
                                echo '<td>'.$cartasRep[$i].'</td>';                                                            
                            }
                        }                        
                    echo '</tr>';
                echo '</tbody>';
            echo '</table> ';

            echo '<br>';

            //Métodos cartas repartidas y cartas disponibles
            echo '<table class="table text-light bg-dark text-center align-items-center">';
                echo '<thead class="thead-dark">';
                    echo '<tr>';                    
                        echo '<th scope="col">Cartas repartidas</th>';
                        echo '<th scope="col">Cartas disponibles</th>';                   
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                    echo '<tr>';                                       
                        echo '<td>'. $bEspanhola->cartasRepartidas() .'</td>';
                        echo '<td>'. $bEspanhola->cartasDisponibles() .'</td>';                   
                    echo '</tr>';                    
                echo '</tbody>';
            echo '</table> ';
        
            echo '<br>';


            //Método mostrar baraja española
            echo '<table class="table text-light bg-dark text-center align-items-center">';
                echo '<thead class="thead-dark">';
                    echo '<tr>';
                        echo '<th colspan="5">Mostrar baraja española</th>';                  
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';                
                    $bEspanhola->mostrarBaraja();                                                                                    
                echo '</tbody>';
            echo '</table> ';

            echo '<br>';
            
            //Método mostrar baraja francesa
            echo '<table class="table text-light bg-dark text-center align-items-center">';
                echo '<thead class="thead-dark">';
                    echo '<tr>';
                        echo '<th colspan="5">Mostrar baraja francesa</th>';                  
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';                
                    $bFrancesa->mostrarBaraja();                                                                                    
                echo '</tbody>';
            echo '</table> ';

            echo '<br>'; 

            //Método comparar
            echo '<div class="container-fluid">';
                echo '<div class="row">'; 
                    if (strcmp($bEspanhola->compareTo($bEspanhola, $bFrancesa),"Las barajas introducidas son diferentes") !== 0) {
                        echo '<div class="alert alert-success" role="alert" style="width:100%">';                    
                    }else{
                        echo '<div class="alert alert-danger" role="alert" style="width:100%">';                    
                    }
                    echo '<h4 class="alert-heading">'.$bEspanhola->compareTo($bEspanhola, $bFrancesa).'</h4>';                                  
                    echo '</div>';                
                echo '</div>';
            echo '</div>';            
            ?>

        </div>
        
        <br>

        <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#staticBackdrop">
            <p>
                Click aquí para ver<span id="pdf"> Tarea4.pdf</span>
            </p>
        </button>
    </div>

</body>

</html>