<?php
require_once('../utils/conexion.php');
require_once('Solicitante.php');
require_once('Usuario.php');

class PedidoVehiculoChofer
{

    private $IDPedidoVehiculoChofer;
    private $UsuarioID;
    private $VehiculoID;
    private $PedidoID;

    function __construct($IDPedidoVehiculoChofer, $UsuarioID, $VehiculoID, $PedidoID)
    {
        $this->IDPedidoVehiculoChofer = $IDPedidoVehiculoChofer;
        $this->UsuarioID = $UsuarioID;
        $this->VehiculoID = $VehiculoID;
        $this->PedidoID = $PedidoID;
    }

    /**
     * @return mixed
     */
    public function getIDPedidoVehiculoChofer()
    {
        return $this->IDPedidoVehiculoChofer;
    }

    /**
     * @param mixed $IDPedidoVehiculoChofer
     */
    public function setIDPedidoVehiculoChofer($IDPedidoVehiculoChofer)
    {
        $this->IDPedidoVehiculoChofer = $IDPedidoVehiculoChofer;
    }

    public function getUsuarioID()
    {
        return $this->UsuarioID;
    }

    public function setUsuarioID($UsuarioID)
    {
        $this->UsuarioID = $UsuarioID;
    }

    public function getVehiculoID()
    {
        return $this->VehiculoID;
    }

    public function setVehiculoID($VehiculoID)
    {
        $this->VehiculoID = $VehiculoID;
    }

    public function getPedidoID()
    {
        return $this->PedidoID;
    }


    public function setPedidoID($PedidoID)
    {
        $this->PedidoID = $PedidoID;
    }


    public function insert()
    {
        $conexion = Conexion::conectar();

        $resultado = $conexion->query(
            "INSERT INTO PedidoVehiculoChofer(IDPedidoVehiculoChofer, UsuarioID, VehiculoID, PedidoID)
              VALUE (NULL , " .
            $this->getUsuarioID() . ", " . $this->getVehiculoID() . ", " .
            $this->getPedidoID() . ")");
        $resultid = mysqli_insert_id($conexion);
        $this->setIDPedidoVehiculoChofer($resultid);
        if ($conexion->error) {
            return ("Error: " . $conexion->error);
        } else {
            return ("<span style='color:green;'> Registro insertado correctamente</span>");
        }
    }

    public function delete()
    {
        $conexion = Conexion::conectar();
        $resultado = $conexion->query("DELETE FROM PedidoVehiculoChofer WHERE IDPedidoVehiculoChofer = " . $this->getIDPedidoVehiculoChofer());
        if ($conexion->error) {
            return ("Error: " . $conexion->error);
        } else {
            return ("Registro eliminado correctamente");
        }
    }

    public function update()
    {
        $conexion = Conexion::conectar();
        $resultado = $conexion->query("UPDATE PedidoVehiculoChofer SET " .
            " UsuarioID =" . $this->getUsuarioID() .
            ", VehiculoID = " . $this->getVehiculoID() .
            ", PedidoID = " . $this->getPedidoID() .
            " WHERE IDPedidoVehiculoChofer = " . $this->getIDPedidoVehiculoChofer() . ";");
        if ($conexion->error) {
            return ("Error: " . $conexion->error);
        } else {
            return ("Registro actualizado correctamente");
        }
    }

    static public function findAll()
    {
        $resultado = Conexion::conectar()->query("SELECT * FROM PedidoVehiculoChofer");
        if ($resultado->num_rows > 0) {
            return ($resultado);
        } else {
            return ("No existen registros.");
        }
    }

    static public function findById($id)
    {
        $resultado = Conexion::conectar()->query("SELECT * FROM PedidoVehiculoChofer WHERE IDPedidoVehiculoChofer = " . $id);
        if ($resultado->num_rows > 0) {
//            $pedido = array();
//            while ($row = $resultado->fetch_assoc()) {
//                array_push($pedido, new Pedido($row['IDPedido'], Solicitante::findByID($row['IDSolicitante']), Usuario::findByID($row['IDUsuario']), $row['Descripcion'], $row['FechaHora']));
//            }
//            return ($pedido[0]);
            return $resultado;
        } else {
            return ("No existen registros.");
        }
    }

    public static function findAllWhere($where)
    {

        $resultado = Conexion::conectar()->query("SELECT * FROM PedidoVehiculoChofer WHERE " . $where);
        if ($resultado->num_rows > 0) {
            $pedidosVehiculosChoferes = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($pedidosVehiculosChoferes, new PedidoVehiculoChofer($row['IDPedidoVehiculoChofer'],
                    $row['UsuarioID'], $row['VehiculoID'], $row['PedidoID']));
            }
            return ($pedidosVehiculosChoferes);
        } else {
            return null;
        }
    }
}

?>
