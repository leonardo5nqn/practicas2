<?php
//19/09/2019 Editado por Diego 
//
//--------------------------------------------------
//LLAMO AL ARCHIVO DE CONEXION A LA BASE DE DATOS y La Clase Persona
//--------------------------------------------------
require_once ("../utils/conexion.php");
//require_once ("../Persona.php");
//require_once ("Persona.php");

//-------------------------------------------------
//DECLARO LA CLASE PARA EL OBJETO Persona
//--------------------------------------------------
class Empleado {
    //Declaro las variables con visibilidad private, solo para el uso de la clase
    private $IDEmpleado;
    
    private $PersonaID;
    private $fechaIngreso;

    ///---------------------------
    //DEFINO EL CONSTRUCTOR - PHP no soporta sobrecarga de constructores.
    //----------------------------
    function __construct($_IDEmpleado,  $_personaID, $_fechaIngreso)
    {
        $this->setIDEmpleado($_IDEmpleado);
        
        $this->setIDPersona($_personaID);
        $this->setIngreso($_fechaIngreso);
    }

    //---------------------------
    //CREO LOS GETTER Y SETTERS
    //--------------------------
    public function getIDEmpleado(){
        return $this->IDEmpleado;
    }
    private function setIDEmpleado($_idEmpleado){
        $this->IDEmpleado = $_idEmpleado;
    }

    public function getIngreso(){
        return $this->fechaIngreso;
    }
    private function setIngreso($_fechaIngreso){
        $this->fechaIngreso = $_fechaIngreso;
    }

    public function getIDPersona(){
        return $this->PersonaID;
    }
    //verificar el Set
    private function setIDPersona($_idpersona){
        $this->PersonaID=$_idpersona;
    }
    // private function setIDPersona($_idpersona){
    //     $this->PersonaID = Persona::findByID($_idpersona);
    // }

    //Alta

    function insert(){
        $sql="INSERT INTO Empleado (IDEmpleado, PersonaID, fechaIngreso) 
        VALUES ('".$this->getIDEmpleado()."','".$this->getIDPersona()."','".$this->getIngreso()."')";
        $conexion = Conexion::conectar();
        $resultado = $conexion->query($sql);
        echo ($sql);
        
        //$resultadoID =mysqli_insert_id($conexion);
        //$this ->setIDEmpleado($resultadoID);

        //modelo para verificar el insert (verificar funcionamiento)
        if ($resultado == false){
            echo "Error";
        }
        else {
            echo "Se Inserto un Empleado";
        }
        return true;
    }

    //Baja

    function delete(){
        
        $resultado = Conexion::conectar()->query("DELETE FROM Empleado where IDEmpleado = ".$this->getIDEmpleado()."");

            if ($resultado == false ){
                echo "Error";
            }     
            else {
                echo "Se elimino el Empleado";
            }
        return true;
    }   

    //Modificar
    function update(){
        $resultado = Conexion::conectar()->query("UPDATE Empleado set PersonaID ='".$this->PersonaID()."',fechaIngreso = '".$this->getIngreso()."' 
        where IDEmpleado =".$this->getIDEmpleado());

        //$rta = Conexion::conectar()->query("UPDATE Empleado set PersonaID =".$this->PersonaID().", fechaIngreso = ".$this->getIngreso()." where IDEmpleado =".$this->getIDEmpleado()"");
        //$rs= mysql_query($rta); 

        if ($resultado == false ){
            echo "error";
        }     
        else {
            echo "se modifico un Empleado";
        }

    }
    //----------------------------------------------
    //obtengo todos los Empleados en un array
    //---------------------------------------------
    public static function findAll (){
        $resultado = Conexion::conectar()->query ("SELECT * FROM Empleado");
        //Se encontro en la BD error con la fecha Ingreso, estabamal escrita.
        //Envio la consulta a un arreglo con todos los objetos
        if ($resultado->num_rows > 0){
            $empleado= array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($empleado, new Empleado ($row['IDEmpleado'],$row['fechaIngreso'].$row['PersonaID']));
            }
        return($empleado);
        }
        else{
            return ("No existen Regsitros.");
        }
    }
    //--------------------------------------
    //ONTENGO UN VEHICULO POR ID (FIND by ID)
    //--------------------------------------
    static function findByID($id){
        $resultado = Conexion::conectar()->query("SELECT * FROM Empleado WHERE IDEmpleado = ".$id); 
        if ($resultado->num_rows() > 0) { 
            $empleado = array();
            while ($row = $resultado->fetch_assoc()) { 
                array_push($empleado=$resultado, new Empleado($$row['IDEmpleado'],$row['fechaIngreso'].$row['PersonaID']));
                //array_push($empleado, new Empleado($row['IDEmpleado'],Solicitante::findByID($row['PersonaID']), $row['fechaIngreso']));
            }
            return ($empleado[0]);
         }    
         else { 
            return ("No hay registros."); 
        }    
    }    
    
    //-------------------------------------
    //FIND ALL + WHERE
    //----------------------------------------
    static function findAllWhere($where){
        $resultado = Conexion::conectar()->query("SELECT * FROM Empleado ".$where);

        if ($resultado->num_rows() > 0) { 
            $empleado = array();
            while ($row = $resultado->fetch_assoc()) { 
                array_push($empleado=$resultado, new Empleado($row['IDEmpleado'],$row['fechaIngreso'].$row['PersonaID']));
                //array_push($empleado, new Empleado($row['IDEmpleado'],Solicitante::findByID($row['PersonaID']), $row['fechaIngreso']));
            }
        return ($empleado);
        }    
        else { 
            return ("No hay registros."); 
        }   
    }
}
//-------------------------------------------------
// $_IDEmpleado,  $_personaID, $_fechaIngreso
//--------------------------------------------------
// Puebas en en el servidor PHP del Local host y la base db4free
// INgreso un Empleado

$instanciaPrueba = new Empleado ('null','2','20190918');
$instanciaPrueba -> insert();
var_dump($instanciaPrueba);

//Borrar Empleado
//$pruebaEliminar = Empleado::findAll([0]->delete());

//Traigo todos los EMpleados
//$pruebaAll = Empleado::findAll();

//Traer Empleado por ID
//$pruebaID = Empleado::findByID(1);
//var_dump($pruebaID);

//traer Array con Where por String
//$pruebaWhere = Empleado::findAllWhere("PersonaID = '2'");

//Modifico un empleado
//$pruebaUpdate->setIngreso("20190202");
//$pruebaUpdate->update();

//Traigo empleado por ID
//$pruIdEmpl = Empleado::findByID(1);
//var_dump($pruIdEmpl);
//exit();
?>