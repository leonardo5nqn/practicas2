<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

Class Rol{

    private $IDRol;
    private $Descripcion;

    //constructor
    public function __construct($Descripcion)
    {
        $this->setDescripcion($Descripcion);
    }
    private function __construct($IDRol, $Descripcion)
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

    private function setDescripcion($descp){
        $this->Descripcion = $descp;
    }

    //Alta

    public static function insert(){
        $rta = Conexion::conectar()->query("INSERT INTO Rol (IDRol, Descripcion) values (".$this->getIDRol().", ".$this->getDescripcion()."");
        $rs= mysql_query( $rta); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se inserto";
        }
    }
    //Modificacion
    public static function update(){
        $rta = Conexion::conectar()->query("UPDATE Rol set IDRol =".$this->IDRol.", Descripcion=".$this->getDescripcion()."");
        $rs= mysql_query( $rta); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se modifico";
        }
    }

    //Baja
    public static function delete(){
        $rta = Conexion::conectar()->query("DELETE FROM Rol where IDRol =".$this->getIDRol()."");
        $rs= mysql_query( $rta); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se elimino";
        }
    }

    //ListarRol
    static function findByID($id){
        $respuesta = (Conexion::conectar()->query("SELECT * FROM Rol WHERE IDRol = ".$id)); 
        if ($respuesta->rowCount() > 0) { 
            $rol = array();
            while ($row = $respuesta->fetch()) { 
               array_push($rol, new Rol($row['IDRol'],$row['Descripcion']));
            }
         return ($rol);
         }    
         else { 
            return ("No hay registros."); 
         }
          }   
    }    
    
    static function listarEmpresa($where){
        $respuesta = (Conexion::conectar()->query("SELECT * FROM Rol ".$where));
      if ($respuesta->rowCount() > 0) { 
        $rol = array();
        while ($row = $respuesta->fetch()) { 
           array_push($rol, new Rol($row['IDRol'],$row['Descripcion']));
        }
     return ($rol);
     }    
     else { 
        return ("No hay registros."); 
     }
      }   
      
    }
    static function listaRol(){
        $rta = Conexion::conectar()->query("SELECT *FROM Rol");
        return ($rta);        
    } 
}
?>