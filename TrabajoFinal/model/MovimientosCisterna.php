<?php
require_once ("../utils/conexion.php");

class MovimientosCisterna
{
    private $movimientosid;
    private $playeroid;
    private $fechahora;
    private $litros;
    private $tipoCargaid;
    private $cisternaid;
    private $porcentaje;
    private $pvcid;

    //constructor
    function __construct()
    {
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

     //ingresar MovimientosCisterna
     static function insert()
      {
         $respuesta = Conexion::conectar()->query("INSERT INTO MovimientosCisterna (IDMovimientos, IDPlayero, FechaHora , Litros, IDTipoCarga, IDCisterna, Porcentaje, IDPvc)
         values (".$this->movimientosid.",".$this->playeroid.",".$this->fechahora.",".$this->litros.",".$this->tipocargaid.",".$this->cisternaid.",".$this->porcentaje.",".$this->pvcid.")");
         return ($respuesta);    
      }  
     //eliminar MovimientosCisterna
     static function delete()
      {
         $respuesta = Conexion::conectar()->query("DELETE FROM MovimientosCisterna where IDMovimientos =".$this->movimientosid."");
         return ($respuesta);
      }  
     //editar MovimientosCisterna 
    static function update()
      {
         $respuesta = Conexion::conectar()->query("UPDATE MovimientosCisterna set  IDPlayero =".$this->playeroid.", FechaHora =".$this->fechahora.", Litros =".$this->litros.", IDTipoCarga =".$this->tipocargaid.",
         IDCisterna =".$this->cisternaid.", Porcentaje =".$this->porcentaje.", IDPvc =".$this->pvcid."
         where IDMovimientos =".$this->movimientosid."");
         return ($respuesta);
      }
      //Listado de movimientos
      static function mostrarMovimientosCisterna()
      {
         Conexion::conectar()->query("SELECT * from MovimientosCisterna");
      }

}
?>