<?php
   require ("../utils/conexion.php");

class TipoCarga{

    private $tipoCargaID;
    private $descripcion;

    public function  __construct($descripcion){
      $this->setDescripcion($descripcion);
   }

   private function  __construct($id, $descripcion){
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
         $query = Conexion::conectar()->query("INSERT INTO TipoCarga DescripcionCarga VALUES('".$this->descripcion."')");
         if($query->error) {
             return ("Error: ".$query->error);
         } else {
             return ("Registro insertado correctamente");
         }
      }

     public function delete(){
         $query = Conexion::conectar()->query("DELETE FROM TipoCarga WHERE IDTipoCarga = ".$this->tipoCargaID);
         if($query->error){
            return ("Error: ".$query->error);
         } else {
            return ("Registro eliminado correctamente");
         }
      }

     public function update(){
         $query = Conexion::conectar()->query("UPDATE TipoCarga SET DescripcionCarga = '".$this->Nombre."' where IDTipoCarga = ".$this->tipoCargaID);
         if($query->error){
             return ("Error: ".$query->error);
         } else {
             return ("Registro actualizado correctamente");
         }
      }
        
     static function findByID($id){
         $response = Conexion::conectar()->query("SELECT * FROM TipoCarga WHERE IDTipoCarga = ".$id);
         if ($response->num_rows > 0) { 
            $cargas = array();
            while ($row = $response->fetch_assoc()) { 
               array_push($cargas, new TipoCarga($row['IDTipoCarga'], $row['DescripcionCarga']));
            }
         return ($cargas[0]);
         }    
         else { 
            return ("No existen registros."); 
         }
      }
     

    static function listarTipoCarga($where){
          $response = Conexion::conectar()->query("SELECT * FROM TipoCarga ".$where);
          if ($response->num_rows > 0) { 
             $cargas = array();
             while ($row = $response->fetch_assoc()) { 
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
