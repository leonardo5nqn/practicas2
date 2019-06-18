<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

class Empleado {

    private $fechaIngreso;
    private $IDEmpleado;
    private $PersonaID;

    //Constructor
    function __construct()
    {
    }
    //Get/Set
    public function getIngreso(){
        return $this->fechaIngreso;
    }
    public function setIngreso($ingreso){
        $this->fechaIngreso = $ingreso;
    }

    //Alta

    static function insert(){
        $rta = Conexion::conectar()->query("INSERT INTO Empleado (IDEmpleado, PersonaID, fechaIngreso) values (".$this->IDEmpleado.",".$this->PersonaID.",".$this->fechaIngreso."");
        return ($rta); 
    }

    //Baja

    static function delet(){
        $rta = Conexion::conectar()->query("DELETE FROM Empleado where IDEmpleado = ".$this->IDEmpleado."");
        return ($rta);
    }

    //Modificar
    static function update(){
        $rta = Conexion::conectar()->query("UPDATE Empleado set PersonaID =".$this->PersonaID.", fechaIngreso = ".$this->fechaIngreso."");
        return ($rta);

    }





}


?>