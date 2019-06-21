<?php
require_once ("../utils/conexion.php");

class Pedido{

    private $pedidoID;
    private $solicitanteID;
    private $personaID;
    private $descripcion;
    private $fechaHora;

    public function Pedido(){}

     /*
    public function setID($id){
        $this->IDPedido = $id;
     } */
     
     public function getID(){
        return $this->pedidoID;
     }
  
     public function setIDSolicitante($id){ // <------------------ ?????????????????
        $this->solicitanteID = $id;
     }

     public function getIDSolicitante(){
        return $this->solicitanteID;
     }

     public function setPersonaID($id){
        $this->personaID = $id;
     }

     public function getPersonaID(){
        return $this->personaID;
     }

     public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
     }
    
     public function getDescripcion(){
        return $this->fecha;
     }

     public function setFechaHora($fecha){
        $this->fechaHora = $fecha;
     }

     public function getFechaHora(){
        return $this->fechaHora;
     }

     public function insert(){
            return (Conexion::conectar()->query("INSERT INTO Pedido VALUE ".$this->));    
        }

     public function delete(){
            return (Conexion::conectar()->query("DELETE FROM Pedido WHERE  = ".$this->));
        }

     public function update(){
            return (Conexion::conectar()->query("UPDATE Pedido SET  = ".$this->." where IDPedido = ".$this->));
        }
        
     static function findByID($id){
            return (Conexion::conectar()->query("SELECT * FROM Pedido WHERE IDPedido = ".$id));    
        }    

    static function listarPedido($where){
          return (Conexion::conectar()->query("SELECT * FROM Pedido ".$where));
        }
}
?>