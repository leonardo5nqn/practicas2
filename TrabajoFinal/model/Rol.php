<?php
require_once("../utils/conexion.php");

Class Rol {
    
    private $IDRol;
    private $Descripcion;
    
    public function __construct($IDRol, $Descripcion) {
        $this->setID($IDRol);
        $this->setDescripcion($Descripcion);
    }
    
    public function getID() {
        return $this->IDRol;
    }
    
    private function setID($id) {
        $this->IDRol = $id;
    }
    
    public function getDescripcion() {
        return $this->Descripcion;
    }
    
    public function setDescripcion($descp) {
        $this->Descripcion = $descp;
    }
    
    public function insert() {
        $conexion = Conexion::conectar();
        $resultado = $conexion->query("INSERT INTO Rol (Descripcion) values ('".$this->getDescripcion()."')");
        $resultid = mysqli_insert_id($conexion);
        $this->setID($resultid);
        $rs = mysql_query($resultado);
        if ($rs == false) {
            echo "error";
        } else {
            echo "se inserto";
        }
    }
    
    public function update() {
        $resultado = Conexion::conectar()->query("UPDATE Rol set  Descripcion='".$this->getDescripcion()."'");
        $rs = mysql_query($resultado);
        if ($rs == false) {
            echo "error";
        } else {
            echo "se modifico";
        }
    }
    
    public function delete() {
        $resultado = Conexion::conectar()->query("DELETE FROM Rol where IDRol =".$this->getID()."");
        $rs = mysql_query($resultado);
        if ($rs == false) {
            echo "error";
        } else {
            echo "se elimino";
        }
    }
    
    public static function FindAll() {
        $resultado = Conexion::conectar()->query("SELECT * FROM Rol");
        if ($resultado->num_rows > 0) {
            $rol = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($rol, new Rol($row['IDRol'], $row['Descripcion']));
            }
            return ($rol);
        } else {
            return ("No existen registros.");
        }
    }
    
    public static function findByID($id) {
        $respuesta = Conexion::conectar()->query("SELECT * FROM Rol WHERE IDRol = ".$id);
        if ($respuesta->num_rows > 0) {
            $rol = array();
            while ($row = $respuesta->fetch_assoc()) {
                array_push($rol, new Rol($row['IDRol'], $row['Descripcion']));
            }
            return ($rol[0]);
        } else {
            return ("No hay registros.");
        }
    }
   
    public static function findAllWhere($where) {
        $respuesta = (Conexion::conectar()->query("SELECT * FROM Rol WHERE ".$where));
        if ($respuesta->num_rows > 0) {
            $rol = array();
            while ($row = $respuesta->fetch_assoc()) {
                array_push($rol, new Rol($row['IDRol'], $row['Descripcion']));
            }
            return ($rol);
        } else {
            return ("No hay registros.");
        }
    }
}
?>