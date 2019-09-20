<?php
require_once ("../utils/conexion.php");

class MovimientoCisterna
{
    private $movimientoid;
    private $playeroid;
    private $fechahora;
    private $litros;
    private $tipoCargaid;
    private $cisternaid;
    private $porcentaje;
    private $pvcid;

    //constructor
    public function __construct($movimientoid, $_playeroid, $_fechahora,$_litros,$_tipoCargaid,$_cisternaid,$_porcentaje,$_pvcid )
   {
      $this->setMovimientoid($movimientoid);
      $this->setPlayeroid($_playeroid);
      $this->setFechahora($_fechahora);
      $this->setLitros($_litros);
      $this->setTipoCargaid($_tipoCargaid);
      $this->setCisternaid($_cisternaid);
      $this->setPorcentaje ($_porcentaje);
      $this->setPvcid($_pvcid);
   }
    
    //metodos get y set movimientoid
    public function getMovimientoid()
    {
      return $this->movimientoid;
    }
    private function setMovimientoid($_id)
    {
      $this->movimientoid = $_id;
    }

    //metodos get y set playeroid
    public function getPlayeroid()
    {
      return $this->playeroid;
    }

   private function setPlayeroid($_Playeroid)
    {
      $this->playeroid = $_Playeroid;
    }
    
    //metodos get y set fechahora
     public function getFechaHora()
      {
        return $this->fechahora;
      }
  
     private function setFechahora($_fh)
      {
        $this->fechahora = $_fh;
      }
     //metodos get y set litros
     public function getLitros()
      {
        return $this->litros;
      }
  
     private function setLitros($_litros)
     {
        $this->litros = $_litros;
     }
     //metodos get y set tipoCargaid
     public function getTipoCargaid()
      {
        return $this->tipoCargaid;
      }
  
     private function setTipoCargaid($_TipoCargaid)
     {
        $this->tipoCargaid = $_TipoCargaid;
     }
     //metodos get y set cisternaid
     public function getCisternaid()
      {
        return $this->cisternaid;
      }
  
     private function setCisternaid($_Cisternaid)
     {
        $this->cisternaid = $_Cisternaid;
     }

     //get y set de porcentaje
     public function getPorcentaje(){
       return $this->porcentaje:
     }
     private function setPorcentaje($_porcen){
       $this->porcentaje=$_porcen;
     }

     //metodos get y set pvcid
     public function getPvcid()
      {
        return $this->pvcid;
      }
  
     private function setPvcid($_Pvcid)
     {
        $this->pvcid = $_Pvcid;
     }
     

     //ingresar MovimientosCisterna
     function insert()
      {
        $resultado = Conexion::conectar()->query("INSERT INTO MovimientoCisterna (IDMovimiento, IDPlayero, FechaHora , Litros, IDTipoCarga, IDCisterna, Porcentaje, IDPvc)
        values ('".$this->getMovimientoid()."','".$this->getPlayeroid()."','".$this->getFechaHora()."','".$this->getLitros()."','".$this->getTipoCargaid()."','".$this->getCisternaid()."','".$this->porcentaje."','".$this->getPvcid()."')");
        
        $resulID=mysqli_insert_id(Conexion::conectar());
        $this->setMovimientoid($resulID);
        return true;    
      }  
     //eliminar MovimientosCisterna
     function delete()
      {
          $resultado = Conexion::conectar()->query("DELETE FROM MovimientoCisterna where IDMovimiento =".$this->getMovimientoid()."");
          return true;
      }  
     //editar MovimientosCisterna 
    function update()
      {
         $resultado = Conexion::conectar()->query("UPDATE MovimientoCisterna set  IDPlayero ='".$this->getPlayeroid()."', FechaHora ='".$this->getFechaHora()."', Litros ='".$this->getLitros()."', IDTipoCarga ='".$this->getTipoCargaid()."',
         IDCisterna ='".$this->getCisternaid()."', Porcentaje ='".$this->getPorcentage()."', IDPvc ='".$this->getPvcid()."'
         where IDMovimiento =".$this->getMovimientoid());
         return true;
      }
      
      public static function findAll(){
        $resultado=Conexion::conectar()->query("SELECT * FROM MovimientosCisterna");
        
        
        if ($resultado->num_rows > 0){
          $movimientoCisternas=array();
          while ($row=$resultado->fetch_assoc()){
            array_push($movimientoCisternas, new MovimientosCisterna($row['IDMovimiento'],$row['IDPlayero'],$row['FechaHora'],$row['Litros'],$row['IDTIpoCarga'],$row['IDCisterna'],$row['Porcentaje'],$row['IDPvc']));
          }
          return ($movimientoCisternas);
        }
        else {
          return ("No existen registros");
        }
        
      }

      public static function findByID($id)
      {
        $resultado = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna WHERE IDMovimiento = ".$id);
        if ($resultado->num_rows > 0){
          $movimientoCisternas=array();
          while ($row=$resultado->fetch_assoc()){
            array_push($movimientoCisternas, new MovimientosCisterna($row['IDMovimiento'],$row['IDPlayero'],$row['FechaHora'],$row['Litros'],$row['IDTIpoCarga'],$row['IDCisterna'],$row['Porcentaje'],$row['IDPvc']));
          }
          return ($movimientoCisternas);
        }
        else {
          return ("No existen registros");
        }
      } 

      static function listarUsuario($where)
      {
        $resultado = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna ".$where);
       
          if ($resultado->num_rows > 0){
            $movimientoCisternas=array();
            while ($row=$resultado->fetch_assoc()){
              array_push($movimientoCisternas, new MovimientosCisterna($row['IDMovimiento'],$row['IDPlayero'],$row['FechaHora'],$row['Litros'],$row['IDTIpoCarga'],$row['IDCisterna'],$row['Porcentaje'],$row['IDPvc']));
            }
            return ($movimientoCisternas);
          }
          else {
            return ("No existen registros");
          }
      }

}


//PRUEBAS
//--------------------------------------------------------------------------------------------------
//$movimientoid, $_playeroid,  $_fechahora,  $_litros,  $_tipoCargaid,  $_cisternaid,  $_porcentaje,  $_pvcid
//--------------------------------------------------------------------------------------------------
//insert
//$instaMovCis = new MovimientosCisterna (null,"1","20190202","20","1","1","20","3");
//$instaMovCis->insert();

//delete
//$reso=MovimientosCisterna::findAll()[0]->delete();

//Obtengo todos los movimientos
//$reso=MovimientosCisterna::findAll();

//traigo un movimiento por ID
//$reso = MovimientosCisterna::findByID(1);
var_dump($reso);

//Busco por Where
//$reso=MovimientosCisterna("IDPlayero = '1'");

//modifico un movimiento
$reso->setPlayeroid("1");
$reso->update();

$reso2= MovimientosCisterna::findByID(1);
var_dump($reso2);
exit();

?>