<?php
require_once("../utils/conexion.php");
require_once("Usuario.php");
require_once("Cisterna.php");
require_once("TipoCarga.php");

class MovimientoCisterna {
    private $movimientoid;
    private $usuario;
    private $fechahora;
    private $litros;
    private $tipoCarga;
    private $cisterna;
    private $porcentaje;
    private $idPedidoVehiculoCarga;
    
    public function __construct($movimientoid, $_Usuario, $_fechahora, $_litros, $_tipoCarga, $_cisterna, $_porcentaje, $_idPedidoVehiculoCarga) {
        $this->setID($movimientoid);
        $this->setUsuario($_Usuario);
        $this->setFechahora($_fechahora);
        $this->setLitros($_litros);
        $this->setTipoCarga($_tipoCarga);
        $this->setCisterna($_cisterna);
        $this->setPorcentaje($_porcentaje);
        $this->setIDPedidoVehiculoCarga($_idPedidoVehiculoCarga);
    }

    public function getID() {
        return $this->movimientoid;
    }
    
    private function setID($_id) {
        $this->movimientoid = $_id;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }
    
    public function setUsuario($_Usuario) {
        $this->usuario = $_Usuario;
    }
    
    public function getFechaHora() {
        return $this->fechahora;
    }
    
    public function setFechahora($_fh) {
        $this->fechahora = $_fh;
    }
    
    public function getLitros() {
        return $this->litros;
    }
    
    public function setLitros($_litros) {
        $this->litros = $_litros;
    }
    
    public function getTipoCarga() {
        return $this->tipoCarga;
    }
    
    public function setTipoCarga($_TipoCarga) {
        $this->tipoCarga = $_TipoCarga;
    }
    
    public function getCisterna() {
        return $this->cisterna;
    }
    
    public function setCisterna($_Cisterna) {
        $this->cisterna = $_Cisterna;
    }
    
    public function getPorcentaje() {
        return $this->porcentaje;
    }
    
    public function setPorcentaje($_porcen) {
        $this->porcentaje = $_porcen;
    }
    
    public function getIDPedidoVehiculoCarga() {
        return $this->idPedidoVehiculoCarga;
    }

    public function setIDPedidoVehiculoCarga($_idPedidoVehiculoCarga) {
        $this->idPedidoVehiculoCarga = $_idPedidoVehiculoCarga;
    }
    
    public function insert() {
        $conexion  = Conexion::conectar();
        $resultado = $conexion->query('INSERT INTO MovimientoCisterna(IDMovimiento, IDUsuario, FechaHora , Litros, IDTipoCarga, IDCisterna, Porcentaje, IDPedidoVehiculoChofer) 
        VALUES ('.$this->getID().',"'.$this->getUsuario()->getIDUsuario().'","'.$this->getFechaHora().'","'.$this->getLitros().'","'.$this->getTipoCarga()->getID().'","'.$this->getCisterna()->getID().'","'.$this->getPorcentaje().'","'.$this->getidPedidoVehiculoCarga().'")');
        $resultid  = mysqli_insert_id($conexion);
        $this->setID($resultid);
        if ($conexion->error) {
            return ("Error: ".$conexion->error);
        } else {
            return ("Registro insertado correctamente");
        }
    }
    
    
    public function delete() {
        $conexion  = Conexion::conectar();
        $resultado = $conexion->query("DELETE FROM MovimientoCisterna where IDMovimiento =".$this->getID());
        if ($conexion->error) {
            return ("Error: ".$conexion->error);
        } else {
            return ("Registro eliminado correctamente");
        }
    }
    
    public function update() {
        $conexion  = Conexion::conectar();
        $resultado = $conexion->queryquery('UPDATE MovimientoCisterna set IDUsuario ="'.$this->getUsuario()->getIDUsuario().'", FechaHora ="'.$this->getFechaHora().'", Litros ="'.$this->getLitros().'", IDTipoCarga ="'.$this->getTipoCarga()->getID().'",
        IDCisterna ="'.$this->getCisterna()->getIdCisterna().'", Porcentaje ="'.$this->getPorcentage().'", IDPedidoVehiculoChofer ="'.$this->getidPedidoVehiculoCarga()."', WHERE IDMovimiento =".$this->getID());
        if ($conexion->error) {
            return ("Error: ".$conexion->error);
        } else {
            return ("Registro actualizado correctamente");
        }
    }
    
    public function findAll() {
        $resultado = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna");
        if ($resultado->num_rows > 0) {
            $movimientoCisternas = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($movimientoCisternas, new MovimientoCisterna($row['IDMovimiento'], Usuario::findByID($row['IDUsuario']), $row['FechaHora'], $row['Litros'], TipoCarga::findByID($row['IDTipoCarga']), Cisterna::findByID($row['IDCisterna']), $row['Porcentaje'], $row['IDPedidoVehiculoChofer']));
            }
            return ($movimientoCisternas);
        } else {
            return ("No existen registros.");
        }
    }

    public static function findByID($id) {
        $resultado = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna WHERE IDMovimiento = ".$id);
        if ($resultado->num_rows > 0) {
            $movimientoCisternas = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($movimientoCisternas, new MovimientoCisterna($row['IDMovimiento'], Usuario::findByID($row['IDUsuario']), $row['FechaHora'], $row['Litros'], TipoCarga::findByID($row['IDTipoCarga']), Cisterna::findByID($row['IDCisterna']), $row['Porcentaje'], $row['IDPedidoVehiculoChofer']));
            }
            return ($movimientoCisternas[0]);
        } else {
            return ("No existen registros");
        }
    }
    
    public static function findAllWhere($where) {
        $resultado = Conexion::conectar()->query("SELECT * FROM MovimientoCisterna ".$where);
        if ($resultado->num_rows > 0) {
            $movimientoCisternas = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($movimientoCisternas, new MovimientoCisterna($row['IDMovimiento'], Usuario::findByID($row['IDUsuario']), $row['FechaHora'], $row['Litros'], TipoCarga::findByID($row['IDTipoCarga']), Cisterna::findByID($row['IDCisterna']), $row['Porcentaje'], $row['IDPedidoVehiculoChofer']));
            }
            return ($movimientoCisternas);
        } else {
            return ("No existen registros");
        }
    }
}
?>