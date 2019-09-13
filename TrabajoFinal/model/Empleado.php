<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");
require_once ("Persona.php");

class Empleado {

    private $fechaIngreso;
    private $IDEmpleado;
    private $PersonaID;

    //Constructor
    public function __construct($_fechaIngreso, $_personaID)
    {
        $this->setIngreso($_fechaIngreso);
        $this->setIDPersona($_personaID->getIDEmpleado());
    }
    private function __construct($_IDEmpleado, $_fechaIngreso, $_personaID)
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
        $this->PersonaID = Persona::findByID($id);
    }

    //Alta

    static function insert(){
        $rta = Conexion::conectar()->query("INSERT INTO Empleado (IDEmpleado, PersonaID, fechaIngreso) values (".$this->getIDEmpleado().",".$this->PersonaID()->getIDEmpleado().",".$this->getIngreso()."");
        $rs= mysql_query($rta); 

            if ($rs == false ){
                echo "error";
            }     
            else {
                echo "se inserto";
            }
    }

    //Baja

    static function delete(){
        $rta = Conexion::conectar()->query("DELETE FROM Empleado where IDEmpleado = ".$this->getIDEmpleado()."");
        $rs= mysql_query($rta); 

            if ($rs == false ){
                echo "error";
            }     
            else {
                echo "se elimino";
            }
    }   

    //Modificar
    static function update(){
        $rta = Conexion::conectar()->query("UPDATE Empleado set PersonaID =".$this->PersonaID()->getIDEmpleado().", fechaIngreso = ".$this->getIngreso().", 
        where IDEmpleado =".$this->getIDEmpleado()"");
        $rs= mysql_query($rta); 

            if ($rs == false ){
                echo "error";
            }     
            else {
                echo "se modifico";
            }

    }

    static function findByID($id){
        $respuesta = Conexion::conectar()->query("SELECT * FROM Empleado WHERE IDEmpleado = ".$id); 
        if ($respuesta->rowCount() > 0) { 
            $empleado = array();
            while ($row = $respuesta->fetch()) { 
               array_push($empleado, new Empleado($row['IDEmpleado'],Solicitante::findByID($row['PersonaID']), $row['fechaIngreso']));
            }
         return ($empleado);
         }    
         else { 
            return ("No hay registros."); 
         }
          }    
    }    
    
    static function listarEmpresa($where){
        $respuesta = Conexion::conectar()->query("SELECT * FROM Empleado ".$where);
        if ($respuesta->rowCount() > 0) { 
            $empleado = array();
            while ($row = $respuesta->fetch()) { 
               array_push($empleado, new Empleado($row['IDEmpleado'],Solicitante::findByID($row['PersonaID']), $row['fechaIngreso']));
            }
         return ($empleado);
         }    
         else { 
            return ("No hay registros."); 
         }   
    }
}
?>