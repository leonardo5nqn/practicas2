<?php
require_once("../utils/conexion.php");

class Cisterna {
    
    private $IdCisterna;
    private $TotalLitros;
    private $NombreCisterna;
    
    public function __construct($idCisterna, $_totalLitros, $_nombreCisterna) {
        $this->setID($idCisterna);
        $this->setTotalLitros($_totalLitros);
        $this->setNombreCisterna($_nombreCisterna);
    }
    
    public function getID() {
        return $this->IdCisterna;
    }
    
    private function setID($_idCisterna) {
        $this->IdCisterna = $_idCisterna;
    }
    
    public function getTotalLitros() {
        return $this->TotalLitros;
    }
    
    private function setTotalLitros($_totalLitros) {
        $this->TotalLitros = $_totalLitros;
    }
    
    public function getNombreCisterna() {
        return $this->NombreCisterna;
    }
    
    public function setNombreCisterna($_nombreCisterna) {
        $this->NombreCisterna = $_nombreCisterna;
    }
    
    public function insert() {
        $conexion  = Conexion::conectar();
        $resultado = $conexion->query("INSERT INTO Cisterna(TotalLitros, NombreCisterna) 
            VALUES ('".$this->getTotalLitros()."','".$this->getNombreCisterna()."')");
        $resultid  = mysqli_insert_id($conexion);
        $this->setID($resultid);
        return true;
    }
    
    public function delete() {
        $resultado = Conexion::conectar()->query("DELETE FROM Cisterna WHERE IDCisterna=".$this->getID()."");
        return true;
    }
    
    public function update() {
        $resultado = Conexion::conectar()->query("UPDATE Cisterna SET TotalLitros='".$this->getTotalLitros()."',NombreCisterna = '".$this->getNombreCisterna()."' WHERE IDCisterna = ".$this->getID());
        return true;
    }
    
    public static function findAll() {
        $resultado = Conexion::conectar()->query("SELECT * FROM Cisterna");
        if ($resultado->num_rows > 0) {
            $cisternas = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($cisternas, new Cisterna($row['IDCisterna'], $row['TotalLitros'], $row['NombreCisterna']));
            }
            return ($cisternas);
        } else {
            return ("No existen registros.");
        }
    }
    
    public static function findByID($id) {
        $resultado = Conexion::conectar()->query("SELECT * FROM Cisterna WHERE IDCisterna = ".$id);
        if ($resultado->num_rows > 0) {
            $cisternas = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($cisternas, new Cisterna($row['IDCisterna'], $row['TotalLitros'], $row['NombreCisterna']));
            }
            return ($cisternas[0]);
        } else {
            return ("No existen registros.");
        }
    }
    
    public static function findAllWhere($where) {
        $resultado = Conexion::conectar()->query("SELECT * FROM Cisterna WHERE ".$where);
        if ($resultado->num_rows > 0) {
            $cisternas = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($cisternas, new Cisterna($row['IDCisterna'], $row['TotalLitros'], $row['NombreCisterna']));
            }
            return ($cisternas);
        } else {
            return ("No existen registros.");
        }
    }
}
?>