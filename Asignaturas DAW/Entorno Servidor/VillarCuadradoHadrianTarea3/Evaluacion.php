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
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <?php
        require_once('Empleado.php');
        require_once('EmpleadoAsalariado.php');
        require_once('EmpleadoHoras.php');

        $empleadoA1 = new EmpleadoAsalariado("Cesar", "Fernandez", "Fernandez", 123456, 1.1, 15000);
        $empleadoA2 = new EmpleadoAsalariado("Victor", "Leon", "Barciela", 654321, 1.25, 20000);
        $arrayEAsalariado = array($empleadoA1, $empleadoA2);

        $empleadoH1 = new EmpleadoHoras("Jose", "Villar", "Corrales", 112233, 1.1, 15);
        $empleadoH1->horasTotalesMes = 40;
        $empleadoH2 = new EmpleadoHoras("Hadrián", "Villar", "Cuadrado", 332211, 1.1, 20);
        $arrayEHoras = array($empleadoH1, $empleadoH2);

        ?>

        <div class="card text-light bg-dark text-center mt-5">       
            <h3>
                Tarea 03 - Hadrián Villar Cuadrado
            </h3>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>                
                        <button type="button" class="btn btn-secondary text-center" data-dismiss="modal"><i class="fas fa-times"></i></button>                
                    </div>
                    <div class="modal-body">
                    <embed src="pdf/Tarea03.pdf" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <?php
            foreach ($arrayEAsalariado as $Esalariado) {
                echo '<div class="col-lg-3 mt-3 mb-3 usuario">';
                    echo '<div class="card text-light bg-dark">';
                        echo '<div class="avatar text-center mt-3 mb-3">';
                            echo "<img src='https://eu.ui-avatars.com/api/?name=$Esalariado->nombre+$Esalariado->apellido1&background=random&rounded=true'>";
                        echo '</div>';
                        echo '<div class="datos mb-5">';
                            echo '<div class="card-title text-center">';
                                echo '<h6>';
                                    echo  $Esalariado->getNombreCompleto();
                                echo '</h6>';
                            echo '</div>';
                            echo '<div class="card-text text-center"> Numero de SS: ';
                                echo  $Esalariado->numeroSS;
                            echo '</div>';
                            echo '<div class="card-text text-center">';
                                echo  "<br>";
                            echo '</div>';
                            echo '<div class="card-text text-center"> Sueldo mensual: ';
                                echo  $Esalariado->getSalarioMes() . "€";
                            echo '</div>';
                            echo '<div class="card-text text-center"> Porcentaje de incremento: ';
                                echo  (($Esalariado->porcentajeIncremento)-1)*100 ."%";
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';                
            }
            ?>

            <?php
            foreach ($arrayEHoras as $EHoras) {
                echo '<div class="col-lg-3 mt-3 mb-3 usuario">';
                    echo '<div class="card text-light bg-dark">';
                        echo '<div class="avatar text-center mt-3 mb-3">';
                            echo "<img src='https://eu.ui-avatars.com/api/?name=$EHoras->nombre+$EHoras->apellido1&background=random&rounded=true'>";
                        echo '</div>';
                        echo '<div class="datos mb-5">';
                            echo '<div class="card-title text-center">';
                                echo '<h6>';
                                    echo  $EHoras->getNombreCompleto();
                                echo '</h6>';
                            echo '</div>';
                            echo '<div class="card-text text-center"> Numero de SS: ';
                                echo  $EHoras->numeroSS;
                            echo '</div>';
                            echo '<div class="card-text text-center"> Horas: ';
                                echo  $EHoras->horasTotalesMes;
                            echo '</div>';
                            echo '<div class="card-text text-center"> Sueldo mensual: ';
                                echo  $EHoras->getSalarioMes() . "€";
                            echo '</div>';
                            echo '<div class="card-text text-center"> Porcentaje de incremento: ';
                            echo  (($EHoras->porcentajeIncremento)-1)*100 ."%";
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';                
            }
            ?>
        </div>

        <div>
            <div class="card border-dark mb-3">
                <div class="card-header text-light bg-dark">
                    
                    <svg class="mr-3" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" fill="none" stroke="currentColor"
                    style="--darkreader-inline-fill:none; --darkreader-inline-stroke:white; height:28px; width:28px;" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                            </path>
                        </svg>
                    <b>
                        Evaluación
                    </b>
                </div>
                <div class="card-body text-dark">
                    
                    <p class="card-text">
                        <?php                     
                        echo "El empleado " . $empleadoA1->getNombreCompleto() . " es un empleado asalariado que cobra " . $empleadoA1->getSalarioMes() . " euros al mes.<br>";
                        echo "El empleado " . $empleadoH1->getNombreCompleto() . " es un empleado contratado por horas que cobra " . $empleadoH1->getSalarioMes() . " euros al mes.<br>";
                        echo "El empleado " . $empleadoA2->getNombreCompleto() . " es un empleado asalariado que cobra " . $empleadoA2->getSalarioMes() . " euros al mes.<br>";
                        echo $empleadoH1->comparar($empleadoH1, $empleadoH2) . ".<br>";
                        echo $empleadoA1->comparar($empleadoA1, $empleadoA2) . ".<br>";
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#staticBackdrop">
            <p>
                Click aquí para ver<span id="pdf"> Tarea3.pdf</span>
            </p>
        </button>
    </div>

</body>

</html>