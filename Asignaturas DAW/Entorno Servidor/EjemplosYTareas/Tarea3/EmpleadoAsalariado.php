<?php

class EmpleadoAsalariado extends Empleado {
// Empleado con un sueldo fijo al año
   private $salarioAnual;
   const PAGAS=14;
   
// constructor
   public function __construct($nombre, $apellido1, $apellido2, $NSS, $aumento,
                               $salario )
   {
       parent::__construct($nombre, $apellido1, $apellido2, $NSS, $aumento);
        $this->salarioAnual=$salario;

   }
    function __autoload($clase) {  
       require_once $clase . '.php';  
    }

   public function salarioMes()
   {
      $this->incrementarSalario(); 
      return number_format($this->salarioAnual/EmpleadoAsalariado::PAGAS,
                           2, ',', '.');
   } 
    
   public function incrementarSalario() {
        $this->salarioAnual+=$this->aumento*$this->salarioAnual/100;
    }
}
?>
