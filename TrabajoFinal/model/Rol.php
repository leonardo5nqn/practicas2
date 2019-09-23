<?php
//LLAMO A LA CLASE CONEXION
require_once("../utils/conexion.php");

Class Rol{

    private $IDRol;
    private $Descripcion;

    //constructor
    public function __construct($IDRol, $Descripcion)
    {
        $this->setIDRol($IDRol);
        $this->setDescripcion($Descripcion);
    }
    //Get/Set

    public function getIDRol(){
        return $this->IDRol;
    }
    private function setIDRol($id){
        $this->IDRol = $id;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function setDescripcion($descp){
        $this->Descripcion = $descp;
    }

    //Alta

    function insert(){
        $conexion = Conexion::conectar();
        $resultado = $conexion->query("INSERT INTO Rol (Descripcion) values ('".$this->getDescripcion()."')");
        $resultid = mysqli_insert_id($conexion);
        $this->setIdCisterna($resultid);
        if($conexion->error){
            return ("Error: ".$conexion->error);
             } else {
             return ("Registro insertado correctamente");
           }
    }
    //Modificacion
    function update(){
        $conexion = Conexion::conectar();
        $resultado = $conexion->query("UPDATE Rol set  Descripcion='".$this->getDescripcion()."'");
        if($conexion->error)
        {
            return ("Error: ".$conexion->error);
            } else {
             return ("Registro actualizado correctamente");
            }
            
    }

    //Baja
    function delete(){
        $conexion = Conexion::conectar();
        $resultado = $conexion->query("DELETE FROM Rol where IDRol =".$this->getIDRol()."");
        return true;
        if($conexion->error){
            return ("Error: ".$conexion->error);
             } else {
             return ("Registro eliminado correctamente");
           }
        
    }
  //OBTENGO TODOS LOS ROLES
    public static function FindAll(){
        $resultado=Conexion::conectar()->query("SELECT * FROM Rol" );
            
        if ($resultado->num_rows > 0) { 
            $rol = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($rol, new Rol ($row['IDRol'],$row['Descripcion']));
            }
         return ($rol);
         }    
         else { 
            return ("No existen registros."); 
         }       
    } 

    //OBTENGO UN ROL POR ID (FIND by ID)
    public static function findByID($id){
        $respuesta = (Conexion::conectar()->query("SELECT * FROM Rol WHERE IDRol = ".$id)); 
        if ($respuesta->num_rows > 0) { 
            $rol = array();
            while ($row = $respuesta->fetch_assoc()) { 
               array_push($rol, new Rol($row['IDRol'],$row['Descripcion']));
            }
         return ($rol[0]);
         }    
         else { 
            return ("No hay registros."); 
         }
          }   
       

    //FIND ALL + WHERE
    public static function findAllWhere($where){
        $respuesta = (Conexion::conectar()->query("SELECT * FROM Rol WHERE ".$where));
        if ($respuesta->num_rows > 0) { 
            $rol = array();
            while ($row = $respuesta->fetch_assoc()) { 
                array_push($rol, new Rol($row['IDRol'],$row['Descripcion']));
            }
            return ($rol);
        }    
        else { 
        return ("No hay registros."); 
        }
    }   
}

    //ESTO INSERTA UN ROL 
    //$instaciaPrueba = new Rol (NULL,"asd");

   // $instaciaPrueba -> insert();

    //ESTO BORRA UN ROL
    //$re = Rol::findAll()[0]->delete();

    //ESTO TRAE MUCHOS ROLES
    //$re = Rol::findAll();

    //ESTO TRAE UN ROL POR ID
    //$re = Rol::findByID(1);
    //var_dump($re);
    //ESTO TRAE ARRAY CON WHERE STRING
    //$re = Rol::findAllWhere(" Descripcion = 'asd' OR 1 = 1 ");

    //$re->setDescripcion("asd");

    //$re->update();

    //$re2 = Rol::findByID(1);

    //var_dump($re2);exit();
?>