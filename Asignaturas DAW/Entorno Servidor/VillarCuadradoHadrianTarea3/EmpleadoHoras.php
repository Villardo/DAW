<?php
require_once('Empleado.php');
class EmpleadoHoras extends Empleado
{
    protected $importeHoras;
    protected $horasTotalesMes = 25;
    protected $porcentajeIncremento = 1;

    public function __construct($nombre, $apellido1, $apellido2, $numeroSS, $porcentajeIncremento, $importeHoras)
    {
        $this->importeHoras = $importeHoras;
        $this->porcentajeIncremento = $porcentajeIncremento;
        parent::__construct($nombre, $apellido1, $apellido2, $numeroSS);
    }

    public function __set($atributo, $valor)
    {
        if (property_exists("EmpleadoHoras", $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists("EmpleadoHoras", $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function getSalarioMes()
    {
        return $this->importeHoras * $this->horasTotalesMes;
    }

    public function incrementarSalario($incremento)
    {
        $this->porcentajeIncremento = $incremento;
    }

    public function comparar(EmpleadoHoras $e1, EmpleadoHoras $e2)
    {
        if ($e1->horasTotalesMes < $e2->horasTotalesMes) {
            echo $e1->getNombreCompleto() . " trabajó " . abs($e1->horasTotalesMes - $e2->horasTotalesMes) . " horas menos que " . $e2->getNombreCompleto();
        } elseif ($e1->horasTotalesMes > $e2->horasTotalesMes) {
            echo $e1->getNombreCompleto() . " trabajó " . abs($e1->horasTotalesMes - $e2->horasTotalesMes) . " horas mas que " . $e2->getNombreCompleto();
        } else {
            echo $e1->getNombreCompleto() . " trabajó las mismas horas que " . $e2->getNombreCompleto();
        }
    }
}
