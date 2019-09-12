<?php
require_once ('../utils/conexion.php');
require_once ('Solicitante.php');
require_once ('Usuario.php');

class Pedido{

    private $pedidoID;
    private $solicitante;
    private $usuario;
    private $descripcion;
    private $fechaHora;

    public function __construct($_solicitante, $_usuario, $_descripcion, $_fechaHora){
      $this->setSolicitante($_solicitante->getID());
      $this->setUsuario($_usuario->getID());
      $this->setDescripcion($_descripcion);
      $this->setFechaHora($_fechaHora);
    }
    
    private function __construct($_pedidoID, $_solicitanteID, $_usuarioID, $_descripcion, $_fechaHora){
      $this->setID($_pedidoID);
      $this->setSolicitante($_solicitanteID);
      $this->setUsuario($_usuarioID);
      $this->setDescripcion($_descripcion);
      $this->setFechaHora($_fechaHora);
   }
     
   private function setID($_id){
      $this->IDPedido = $_id;
     }
     
   public function getID(){
      return $this->pedidoID;
   }
  
     public function setSolicitante($_solicitanteID){
        $this->solicitante = Solicitante::findByID($_solicitanteID);
     }

     public function getSolicitante(){
        return $this->solicitante;
     }

     public function setUsuario($_usuarioID){
        $this->usuario = Usuario::findByID($_usuarioID);
     }

     public function getusuario(){
        return $this->usuario;
     }

     public function setDescripcion($_descripcion){
        $this->descripcion = $_descripcion;
     }
    
     public function getDescripcion(){
        return $this->fecha;
     }

     public function setFechaHora($_fecha){
        $this->fechaHora = $_fecha;
     }

     public function getFechaHora(){
        return $this->fechaHora;
     }

     public function insert(){
      $query = Conexion::conectar()->query("INSERT INTO Pedido VALUE (".$this->getID().", ".$this->getSolicitante()->getID().", ".$this->getusuario()->getID().", ".$this->getDescripcion().", ".$this->getFechaHora().")");
      if( $query === TRUE) {
          return ("Registro insertado correctamente");
      } else {
          return ("Error: ".$query->error);
      }
   }

   public function delete(){
      $query = Conexion::conectar()->query("DELETE FROM Pedido WHERE  PedidoID = ".$this->getID());
      if( $query === TRUE){
         return ("Registro eliminado correctamente");
      } else {
         return ("Error: ".$query->error);
     }
   }

   public function update(){
      $query = Conexion::conectar()->query("UPDATE Pedido SET SolicitanteID = ".$this->getSolicitante()->getID()." usuarioID = ".$this->getusuario()->getID()." Descripcion = ".$this->getDescripcion()."
      FechaHora = ".$this->getFechaHora()." where IDPedido = ".$this->getID());
      if( $query === TRUE){
          return ("Registro actualizado correctamente");
      } else {
          return ("Error: ".$query->error);
      }
   }
        
   static function findByID($id){
      $response = Conexion::conectar()->query("SELECT * FROM Pedido WHERE IDPedido = ".$_id);
      if ($response->rowCount() > 0) { 
         $pedidos = array();
         while ($row = $response->fetch()) { 
            array_push($pedidos, new Pedido($row['PedidoID'], Solicitante::findByID($row['SolicitanteID']), Usuario::findByID($row['UsuarioID']), $row['Descripcion'], $row['FechaHora']));
         }
      return ($pedidos);
      }    
      else { 
         return ("No existen registros."); 
      }
   } 

   static function listarTipoCarga($where){
      $response = Conexion::conectar()->query("SELECT * FROM Pedido ".$_where);
      if ($response->rowCount() > 0) { 
         $pedidos = array();
         while ($row = $response->fetch()) { 
            array_push($cargas, new Pedido($row['PedidoID'], Solicitante::findByID($row['SolicitanteID']), Usuario::findByID($row['UsuarioID']), $row['Descripcion'], $row['FechaHora']));
         }
      return ($pedidos);
      }    
      else { 
         return ("No existen registros."); 
      }
       }
     }
?>