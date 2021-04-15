<?php

class EmpleadoHoras extends Empleado implements Comparar{
   private $horas;
   private $importeHora=25;
   
// constructor
   public function __construct($nombre, $apellido1, $apellido2, $NSS, $aumento,
                               $horas)
   {
       parent::__construct($nombre, $apellido1, $apellido2, $NSS,$aumento);
       $this->horas=$horas;
   }
    function __autoload($clase) {  
       require_once $clase . '.php';  
    }
    public function salarioMes()
   {
      $this->incrementarSalario();  
      return number_format($this->horas*$this->importeHora, 2, ',', '.');
   } 
   public function incrementarSalario() {
        $this->importeHora+=$this->aumento*$this->importeHora/100;
    }
    
    public function comparar($value) {
        try {
            if (!$value instanceof EmpleadoHoras) {
                throw new Exception('No es un empleado por horas');
            } else {
                 if ($this->horas > $value->horas) {
                    $diferencia= $this->horas-$value->horas;
                    return ' trabajó '.$diferencia.' horas más que ';
                }
                 elseif ($this->horas < $value->horas) {
                    $diferencia= $value->horas-$this->horas;
                    return ' trabajó '.$diferencia.' horas menos que ';
                }
                return ' trabajó las mismas horas que ';
            }
        } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
?>
