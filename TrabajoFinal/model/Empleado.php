<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

class Empleado {

    private $fechaIngreso;
    private $IDEmpleado;
    private $PersonaID;

    //Constructor
    function __construct($_IDEmpleado, $_fechaIngreso, $_personaID)
    {
        $this->setIDEmpleado($_IDEmpleado);
        $this->setIngreso($_fechaIngreso);
        $this->setIDPersona($_PersonaID);
    }

    //-----------------
    //Get/Set
    //------------------------
    public function getIDEmpleado(){
        return $this->IDEmpleado;
    }
    
    public function setIDEmpleado($id){
        $this->IDEmpleado = $id;
    }
    public function getIngreso(){
        return $this->fechaIngreso;
    }
    public function setIngreso($ingreso){
        $this->fechaIngreso = $ingreso;
    }
    public function getIDPersona(){
        return $this->PersonaID;
    }
    public function setIDPersona($id){
        $this->PersonaID = $id;
    }

    //Alta

    static function insert(){
        $rta = Conexion::conectar()->query("INSERT INTO Empleado (IDEmpleado, PersonaID, fechaIngreso) values (".$this->IDEmpleado.",".$this->PersonaID.",".$this->fechaIngreso."");
        return ($rta); 
    }

    //Baja

    static function delete(){
        $rta = Conexion::conectar()->query("DELETE FROM Empleado where IDEmpleado = ".$this->IDEmpleado."");
        return ($rta);
    }   

    //Modificar
    static function update(){
        $rta = Conexion::conectar()->query("UPDATE Empleado set PersonaID =".$this->PersonaID.", fechaIngreso = ".$this->fechaIngreso.", 
        where IDEmpleado =".$this->IDEmpleado."");
        return ($rta);

    }

    static function findByID($id){
        return (Conexion::conectar()->query("SELECT * FROM Empleado WHERE IDEmpleado = ".$id));    
    }    
    
    static function listarEmpresa($where){
        return (Conexion::conectar()->query("SELECT * FROM Empleado ".$where));
        
    }





}


?>