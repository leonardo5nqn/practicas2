<?php
require_once ('../utils/conexion.php');
require_once ('Solicitante.php');
require_once ('Usuario.php');

class Pedido{

    private $IDPedido;
    private $solicitante;
    private $usuario;
    private $descripcion;
    private $FechaHora;

    public function __construct($_IDPedido, $_solicitante, $_usuario, $_descripcion, $_FechaHora){
      $this->setID($_IDPedido);
      $this->setSolicitante($_solicitante);
      $this->setUsuario($_usuario);
      $this->setDescripcion($_descripcion);
      $this->setFechaHora($_FechaHora);
    }
    
   private function setID($_id){
      $this->IDPedido = $_id;
     }
     
   public function getID(){
      return $this->IDPedido;
   }
  
     public function setSolicitante($_solicitante){
        $this->solicitante = $_solicitante;
     }

     public function getSolicitante(){
        return $this->solicitante;
     }

     public function setUsuario($_usuario){
        $this->usuario = $_usuario;
     }

     public function getusuario(){
        return $this->usuario;
     }

     public function setDescripcion($_descripcion){
        $this->descripcion = $_descripcion;
     }
    
     public function getDescripcion(){
        return $this->descripcion;
     }

     public function setFechaHora($_fecha){
        $this->FechaHora = $_fecha;
     }

     public function getFechaHora(){
        return $this->FechaHora;
     }

     public function insert(){
      $conexion = Conexion::conectar();
      $resultado = $conexion->query("INSERT INTO Pedido (IDPedido, IDSolicitante, IDUsuario, Descripcion, FechaHora) VALUE (".$this->getID().", ".$this->getSolicitante()->getIdSolicitante().", ".$this->getusuario()->getIDUsuario().", '".$this->getDescripcion()."', '".$this->getFechaHora()."')");
      $resultid = mysqli_insert_id($conexion);
      $this->setID($resultid);
      if($conexion->error){
         return ("Error: ".$conexion->error);
          } else {
          return ("Registro insertado correctamente");
        }
     }
 
     public function delete(){
      $conexion = Conexion::conectar();
      $resultado = $conexion->query("DELETE FROM Pedido WHERE IDPedido = ".$this->getID());
      if($conexion->error){
         return ("Error: ".$conexion->error);
          } else {
          return ("Registro eliminado correctamente");
        }
     }
 
     public function update(){
      $conexion = Conexion::conectar();
      $resultado = $conexion->query("UPDATE Pedido SET IDPedido = '".$this->getID()."', IDSolicitante = '".$this->getSolicitante()->getIdSolicitante()."', IDUsuario = '".$this->getusuario()->getIDUsuario()."', Descripcion = '".$this->getDescripcion()."', FechaHora ='".$this->getFechaHora()."'");
         if($conexion->error){
            return ("Error: ".$conexion->error);
             } else {
             return ("Registro actualizado correctamente");
           }
     }
 
     public function findAll(){
      $resultado=Conexion::conectar()->query("SELECT * FROM Pedido");
         if ($resultado->num_rows > 0) { 
            $pedido = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($pedido, new Pedido($row['IDPedido'], Solicitante::findByID($row['IDSolicitante']), Usuario::findByID($row['IDUsuario']), $row['Descripcion'], $row['FechaHora']));
            }
         return ($pedido);
         }    
         else { 
            return ("No existen registros."); 
         }
     }
 
     public function findById($id){   
         $resultado=Conexion::conectar()->query("SELECT * FROM Pedido WHERE IDPedido = ".$id);
         if ($resultado->num_rows > 0) { 
            $pedido = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($pedido, new Pedido($row['IDPedido'], Solicitante::findByID($row['IDSolicitante']), Usuario::findByID($row['IDUsuario']), $row['Descripcion'], $row['FechaHora']));
            }
         return ($pedido[0]);
         } else { 
            return ("No existen registros."); 
         }     
     }
 
     public function findAllWhere($where){
      $resultado=Conexion::conectar()->query("SELECT * FROM Pedido WHERE ".$where);
      if ($resultado->num_rows > 0) {
         $pedido = array();
         while ($row = $resultado->fetch_assoc()) { 
            array_push($pedido, new Pedido($row['IDPedido'], Solicitante::findByID($row['IDSolicitante']), Usuario::findByID($row['IDUsuario']), $row['Descripcion'], $row['FechaHora']));
         }
      return ($pedido);
      }    
      else {
           return ("No existen registros."); 
      }     
  }
}

  ?>
