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
      $this->movimientoid = $_movimientoid;
      $this->playeroid = $_playeroid;
      $this->fechahora = $_fechahora;
      $this->litros = $_litros;
      $this->tipoCargaid = $_tipoCargaid;
      $this->cisternaid = $_cisternaid;
      $this->porcentaje = $_porcentaje;
      $this->pvcid = $_pvcid;
   }
    
    //metodos get y set movimientoid
    public function getMovimientoid()
    {
      return $this->movimientoid;
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
         values (".$this->movimientoid.",".$this->playeroid.",".$this->fechahora.",".$this->litros.",".$this->tipocargaid.",".$this->cisternaid.",".$this->porcentaje.",".$this->pvcid.")");
         return ($respuesta);    
      }  
     //eliminar MovimientosCisterna
     function delete()
      {
         $respuesta = Conexion::conectar()->query("DELETE FROM MovimientoCisterna where IDMovimiento =".$this->movimientoid."");
         return ($respuesta);
      }  
     //editar MovimientosCisterna 
    function update()
      {
         $respuesta = Conexion::conectar()->query("UPDATE MovimientoCisterna set  IDPlayero =".$this->playeroid.", FechaHora =".$this->fechahora.", Litros =".$this->litros.", IDTipoCarga =".$this->tipocargaid.",
         IDCisterna =".$this->cisternaid.", Porcentaje =".$this->porcentaje.", IDPvc =".$this->pvcid."
         where IDMovimiento =".$this->movimientoid."");
         return ($respuesta);
      }
      static function findByID($id)
      {
        return (Conexion::conectar()->query("SELECT * FROM MovimientoCisterna WHERE IDMovimiento = ".$id));    
      } 

      static function listarUsuario($where)
      {
        return (Conexion::conectar()->query("SELECT * FROM MovimientoCisterna ".$where));
      }

}
?>