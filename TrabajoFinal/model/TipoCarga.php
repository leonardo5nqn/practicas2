<?php
require_once ("../utils/conexion.php");

class TipoCarga{

    private $tipoCargaID;
    private $descripcion;

    public function TipoCarga(){}

     /*
     public function setID($id){
        $this->tipoCargaID = $id;
     } */
     
     public function getID(){
        return $this->tipoCargaID;
     }
  
     public function getDescripcion(){
        return $this->descripcion;
     }
  
     public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
     }

     public function insert(){
            return (Conexion::conectar()->query("INSERT INTO TipoCarga DescripcionCarga VALUE ".$this->descripcion));    
        }

     public function delete(){
            return (Conexion::conectar()->query("DELETE FROM TipoCarga WHERE IDTipoCarga = ".$this->tipoCargaID));
        }

     public function update(){
            return (Conexion::conectar()->query("UPDATE TipoCarga SET DescripcionCarga = ".$this->Nombre." where IDTipoCarga = ".$this->tipoCargaID));
        }
        
     static function findByID($id){
            return (Conexion::conectar()->query("SELECT * FROM TipoCarga WHERE IDTipoCarga = ".$id));    
        }    

    static function listarTipoCarga($where){
          return (Conexion::conectar()->query("SELECT * FROM TipoCarga ".$where));
        }
}
?>