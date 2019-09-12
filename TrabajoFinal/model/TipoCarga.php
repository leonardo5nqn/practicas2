<?php
   require_once ("../utils/conexion.php");

class TipoCarga{

    private $tipoCargaID;
    private $descripcion;

    function  __construct($id, $descripcion){
       $this->setID($id);
       $this->setDescripcion($descripcion);
    }

     private function setID($id){
        $this->tipoCargaID = $id;
     }
     
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
         $query = Conexion::conectar()->query("INSERT INTO TipoCarga DescripcionCarga VALUES(".$this->descripcion.")");
         if( $query === TRUE) {
             return ("Registro insertado correctamente");
         } else {
             return ("Error: ".$query->error);
         }
      }

     public function delete(){
         $query = Conexion::conectar()->query("DELETE FROM TipoCarga WHERE IDTipoCarga = ".$this->tipoCargaID);
         if( $query === TRUE){
            return ("Registro eliminado correctamente");
         } else {
            return ("Error: ".$query->error);
        }
      }

     public function update(){
         $query = Conexion::conectar()->query("UPDATE TipoCarga SET DescripcionCarga = ".$this->Nombre." where IDTipoCarga = ".$this->tipoCargaID);
         if( $query === TRUE){
             return ("Registro actualizado correctamente");
         } else {
             return ("Error: ".$query->error);
         }
      }
        
     static function findByID($id){
         $response = Conexion::conectar()->query("SELECT * FROM TipoCarga WHERE IDTipoCarga = ".$id);
         if ($response->rowCount() > 0) { 
            $cargas = array();
            while ($row = $response->fetch()) { 
               array_push($cargas, new TipoCarga($row['IDTipoCarga'], $row['DescripcionCarga']));
            }
         return ($cargas);
         }    
         else { 
            return ("No existen registros."); 
         }
      }
     

    static function listarTipoCarga($where){
          $response = Conexion::conectar()->query("SELECT * FROM TipoCarga ".$where);
          if ($response->rowCount() > 0) { 
             $cargas = array();
             while ($row = $response->fetch()) { 
                array_push($cargas, new TipoCarga($row['IDTipoCarga'], $row['DescripcionCarga']));
             }
          return ($cargas);
          }    
          else { 
             return ("No existen registros."); 
          }
        }
}
?>
