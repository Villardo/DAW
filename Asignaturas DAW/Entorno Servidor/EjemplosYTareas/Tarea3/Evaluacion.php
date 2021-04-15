<?php
    function __autoload($clase) {  
       require_once $clase . '.php';  
    }

    $empleados[]=new EmpleadoAsalariado('Ana','Fouz','Vila',
                                          '123-452',1 ,32000);
    $empleados[]=new EmpleadoHoras('Lois','Gómez','Vilariño',
                                     '121-444',0,28);
    $empleados[]=new EmpleadoHoras('Laura','Martínez','Vázquez',
                                     '549-479',2,30);
    $empleados[]=new EmpleadoAsalariado('Anita','Pérez','Vila',
                                          '121-213',0,29000);

    $numEmpleados=count($empleados);
    echo 'En total tenemos '.$numEmpleados.' empleados</br>';
   
     for ($i = 0; $i < $numEmpleados; $i++ ) {
         echo '<p>El empleado '.$empleados[$i]->nombreCompleto();
          if ($empleados[$i] instanceof EmpleadoAsalariado) {
              echo ' es un empleado asalariado que cobra ';
          }   
          else  if ($empleados[$i] instanceof EmpleadoHoras) {
              echo ' es un empleado contratado por horas que cobra ';
          }
         echo $empleados[$i]->salarioMes().' euros este mes </p>';
     }
     //comparar dos empleados   
     echo $empleados[1]->nombreCompleto().
          $empleados[1]->comparar($empleados[2]).
          $empleados[2]->nombreCompleto();
   ?>
