<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

Class Rol{

    private $IDRol;
    private $Descripcion;

    //constructor
    function __construct()
    {
        
    }
    //Get/Set

    public function getIDRol(){
        return $this->IDRol;
    }
    public function setIDRol($id){
        $this->IDRol = $id;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function setDescripcion($descp){
        $this->Descripcion = $descp;
    }

    //Alta

    static function insert(){
        $rta = Conexion::conectar()->query("INSERT INTO Rol (IDRol, Descripcion) values (".$this->IDRol.", ".$this->Descripcion."");
        return ($rta);
    }
    //Modificacion
    static function update(){
        $rta = Conexion::conectar()->query("UPDATE Rol set IDRol =".$this->IDRol.", Descripcion=".$this->Descripcion."");
        return ($rta);
    }

    //Baja
    static function delete(){
        $rta = Conexion::conectar()->query("DELETE FROM Rol where IDRol =".$this->IDRol."");
        return ($rta);
    }

    //ListarRol
    static function findByID($id){
        return (Conexion::conectar()->query("SELECT * FROM Rol WHERE IDRol = ".$id));    
    }    
    
    static function listarEmpresa($where){
      return (Conexion::conectar()->query("SELECT * FROM Rol ".$where));
    }
    static function listaRol(){
        $rta = Conexion::conectar()->query("SELECT *FROM Rol");
        return ($rta);
    }

    
}

?>