<?php
     require ("../utils/conexion.php");

class TipoCarga{

    private $tipoCargaID;
    private $descripcion;

   public function  __construct($id, $descripcion){
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
         $conexion = Conexion::conectar();
         $resultado = $conexion->query("INSERT INTO `Tipo Carga` (DescripcionCarga) VALUES ('".$this->descripcion."')");
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
        $resultado = $conexion->query("DELETE FROM TipoCarga WHERE IDTipoCarga = ".$this->getID());
        if($conexion->error){
           return ("Error: ".$conexion->error);
            } else {
            return ("Registro eliminado correctamente");
          }
      }

     public function update(){
      $conexion = Conexion::conectar();
      $resultado = $conexion->query("UPDATE TipoCarga SET DescripcionCarga = '".$this->Nombre."' WHERE IDTipoCarga = ".$this->tipoCargaID);
         if($conexion->error){
            return ("Error: ".$conexion->error);
         } else {
            return ("Registro actualizado correctamente");
         }
      }

      static function findAll(){
         $resultado=Conexion::conectar()->query("SELECT * FROM `Tipo Carga`");
         if ($resultado->num_rows > 0) { 
            $cargas = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($cargas, new TipoCarga($row['IDTipoCarga'], $row['DescripcionCarga']));
            }
         return ($cargas);
         }    
         else { 
            return ("No existen registros."); 
         }
      }
        
     static function findByID($id){
         $resultado=Conexion::conectar()->query("SELECT * FROM TipoCarga WHERE IDTipoCarga = ".$id);
         if ($resultado->num_rows > 0) { 
            $cargas = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($cargas, new TipoCarga($row['IDTipoCarga'], $row['DescripcionCarga']));
            }
         return ($cargas[0]);
         }    
         else { 
            return ("No existen registros."); 
         }
      }
     
    static function findAllWhere($where){
          $resultado=Conexion::conectar()->query("SELECT * FROM TipoCarga WHERE ".$where);
          if ($resultado->num_rows > 0) { 
             $cargas = array();
             while ($row = $resultado->fetch_assoc()) { 
                array_push($cargas, new TipoCarga($row['IDTipoCarga'], $row['DescripcionCarga']));
             }
          return ($cargas);
          }    
          else { return ("No existen registros."); 
          }
        }
}


    //ESTO INSERTA UNA CISTERNA 
    $instaciaPrueba = new TipoCarga(NULL,"Nombre 56");
   
    $instaciaPrueba->insert();

    //ESTO BOORA UNA CISTERNAS
    //$re = Cisterna::findAll()[0]->delete();

    //ESTO TRAE MUCHAS CISTERNAS
    //$re = Cisterna::findAll();

    //ESTO TRAE UNA CISTERNA POR ID
    $re = TipoCarga::findAll();
    var_dump($re);
    //ESTO TRAE ARRAY CON WHERE STRING
    //$re = Cisterna::findAllWhere(" NombreCisterna = 'Nombre 1' OR 1 = 1 ");
/* 
    $re->setNombreCisterna("Nombre 60");

    $re->update();

    $re2 = Cisterna::findByID(2);

    var_dump($re2); */exit();
?>

