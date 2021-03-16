<?php
require_once('Empleado.php');
class EmpleadoAsalariado extends Empleado
{
    protected $importeAnual;
    protected $porcentajeIncremento;

    public function __construct($nombre, $apellido1, $apellido2, $numeroSS, $porcentajeIncremento, $importeAnual)
    {
        $this->importeAnual = $importeAnual;
        $this->porcentajeIncremento = $porcentajeIncremento;
        parent::__construct($nombre, $apellido1, $apellido2, $numeroSS);
    }

    public function __set($atributo, $valor)
    {
        if (property_exists("EmpleadoAsalariado", $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists("EmpleadoAsalariado", $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function getSalarioMes()
    {
        return round($this->importeAnual / 12,2);
    }

    public function incrementarSalario($incremento)
    {
        $this->porcentajeIncremento = $incremento;
    }

    public function comparar(EmpleadoAsalariado $e1, EmpleadoAsalariado $e2){
        if ($e1->importeAnual/12 < $e2->importeAnual/12) {
            echo $e1->getNombreCompleto() . " cobra " . round(abs($e1->importeAnual/12 - $e2->importeAnual/12),2) . "€ al mes menos que " . $e2->getNombreCompleto();
        } elseif ($e1->importeAnual/12 > $e2->importeAnual/12) {
            echo $e1->getNombreCompleto() . " cobra " . round(abs($e1->importeAnual/12 - $e2->importeAnual/12),2) . "€ al mes mas que " . $e2->getNombreCompleto();
        } else {
            echo $e1->getNombreCompleto() . " cobra el mismo sueldo mensual que " . $e2->getNombreCompleto();
        }
    }
}
