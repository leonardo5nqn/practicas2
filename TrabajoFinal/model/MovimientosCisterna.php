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
    public function __construct($_movimientoid, $_playeroid, $_fechahora,$_litros,$_tipoCargaid,$_cisternaid,$_porcentaje,$_pvcid )
   {
      $this->setMovimientoid($_movimientoid);
      $this->setPlayeroid($_playeroid);
      $this->setFechahora($_fechahora);
      $this->setLitros($_litros);
      $this->setTipoCargaid($_tipoCargaid);
      $this->setCisternaid($_cisternaid);
      $this->porcentaje = $_porcentaje;
      $this->setPvcid($_pvcid);
   }
    
    //metodos get y set movimientoid
    public function getMovimientoid()
    {
      return $this->movimientoid;
    }
    private function setMovimientoid($id)
    {
      $this->movimientoid = $id;
    }

    //metodos get y set playeroid
    public function getPlayeroid()
    {
      return $this->playeroid;
    }

   public function setPlayeroid($Playeroid)
    {
      $this->playeroid = $Playeroid;
    }
    
    //metodos get y set fechahora
     public function getFechaHora()
      {
        return $this->fechahora;
      }
  
     public function setFechahora($fh)
      {
        $this->fechahora = $fh;
      }
     //metodos get y set litros
     public function getLitros()
      {
        return $this->listros;
      }
  
     public function setLitros($l)
     {
        $this->litros = $l;
     }
     //metodos get y set tipoCargaid
     public function getTipoCargaid()
      {
        return $this->tipoCargaid;
      }
  
     public function setTipoCargaid($TipoCargaid)
     {
        $this->tipoCargaid = $TipoCargaid;
     }
     //metodos get y set cisternaid
     public function getCisternaid()
      {
        return $this->cisternaid;
      }
  
     public function setCisternaid($Cisternaid)
     {
        $this->cisternaid = $Cisternaid;
     }
     //metodos get y set pvcid
     public function getPvcid()
      {
        return $this->pvcid;
      }
  
     public function setPvcid($Pvcid)
     {
        $this->pvcid = $Pvcid;
     }
     
     

     //ingresar MovimientosCisterna
     function insert()
      {
         $respuesta = Conexion::conectar()->query("INSERT INTO MovimientoCisterna (IDMovimiento, IDPlayero, FechaHora , Litros, IDTipoCarga, IDCisterna, Porcentaje, IDPvc)
         values (".$this->getMovimientoid().",".$this->getPlayeroid().",".$this->getFechaHora().",".$this->getLitros().",".$this->getTipoCargaid().",".$this->getCisternaid().",".$this->porcentaje.",".$this->getPvcid().")");
         return ($respuesta);    
      }  
     //eliminar MovimientosCisterna
     function delete()
      {
         $respuesta = Conexion::conectar()->query("DELETE FROM MovimientoCisterna where IDMovimiento =".$this->getMovimientoid()."");
         return ($respuesta);
      }  
     //editar MovimientosCisterna 
    function update()
      {
         $respuesta = Conexion::conectar()->query("UPDATE MovimientoCisterna set  IDPlayero =".$this->getPlayeroid().", FechaHora =".$this->getFechaHora().", Litros =".$this->getLitros().", IDTipoCarga =".$this->getTipoCargaid().",
         IDCisterna =".$this->getCisternaid().", Porcentaje =".$this->porcentaje.", IDPvc =".$this->getPvcid()."
         where IDMovimiento =".$this->getMovimientoid()."");
         return ($respuesta);
      }
      static function findByID($id)
      {
        $respuesta = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna WHERE IDMovimiento = ".$id);
        while ($fila = $respuesta -> fetch_object()){
        $result[]= $fila; 
      }
      return $result[];     
      } 

      static function listarUsuario($where)
      {
        $respuesta = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna ".$where);
        while ($fila = $respuesta -> fetch_object()){
        $result[]= $fila; 
      }
      return $result[]; 
      }

}
?>