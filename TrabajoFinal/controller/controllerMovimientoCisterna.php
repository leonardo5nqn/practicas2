<?php
class MovimientoCisternaController {
    
    public function __construct() {}
    
    public function index($error) {
        require_once('../model/MovimientoCisterna.php');
        $movimientoCisternas = MovimientoCisterna::findAll();
        require_once('../view/viewMovimientoCisternaIndex.php');
    }

    public function register() {
        require_once('../model/Pedido.php');
        require_once('../model/Usuario.php');
        require_once('../model/Cisterna.php');
        require_once('../model/TipoCarga.php');
        require_once('../model/MovimientoCisterna.php');
        $pedidos = Pedido::findAll();
        $playeros = Usuario::findAll();
        $cargas = TipoCarga::findAll();
        $cisternas = Cisterna::findAll();
        $movimientos = MovimientoCisterna::findAll();
        require_once('../view/viewRegisterMovimientoCisterna.php');
    }

    public function insert($movimientoCisterna) {
        require_once('../model/MovimientoCisterna.php');
        if (strpos($movimientoCisterna->insert(), 'Error') === 0) {
            header('Location: controllerMovimientoCisterna.php?action=register&error='.$movimientoCisterna->getIDMovimientoCisterna());
        } else {
            header('Location: controllerMovimientoCisterna.php?action=register');
        }
    }

    public function update($movimientoCisterna) {
        require_once('../model/MovimientoCisterna.php');
        var_dump("update: ".$movimientoCisterna->update()." e ir al index de vista.");
        //header('Location: ../index.php');
    }

    public function delete($movimientoCisterna) {
        require_once('../model/MovimientoCisterna.php');
        if (strpos($movimientoCisterna->delete(), 'Error') === 0) {
            header('Location: controllerMovimientoCisterna.php?action=register&error='.$movimientoCisterna->getIDMovimientoCisterna());
        } else {
            header('Location: controllerMovimientoCisterna.php?action=register');
        }
    }
}

if (isset($_POST['action'])) {
    $movimientoCisternaController = new MovimientoCisternaController();
    require_once('../model/MovimientoCisterna.php');
    require_once("../model/Usuario.php");
    require_once("../model/Cisterna.php");
    require_once("../model/TipoCarga.php");
    switch ($_POST['action']) {
        case ('new'): 
            if (!empty($_POST['IDUsuario']) && !empty($_POST['FechaHora']) && !empty($_POST['Litros']) && !empty($_POST['IDTipoCarga']) && !empty($_POST['IDCisterna']) && !empty($_POST['Porcentaje']) && !empty($_POST['IDPedidoVehiculoChofer'])) {
                $movimientoCisterna = new MovimientoCisterna('NULL', Usuario::findByID($_POST['IDUsuario']), $_POST['FechaHora'], $_POST['Litros'], TipoCarga::findByID($_POST['IDTipoCarga']), Cisterna::findByID($_POST['IDCisterna']), $_POST['Porcentaje'], $_POST['IDPedidoVehiculoChofer']);
                $movimientoCisternaController->insert($movimientoCisterna);
            } else {
                echo "Campos incompletos.";
            }
            break;
        case ('update'):
            if (!empty($_POST['idMovimientoCisterna'])) {
                $movimientoCisterna = new MovimientoCisterna($_POST['idMovimientoCisterna'], Persona::findByID($_POST['persona']['personaid']), Empresa::findByID($_POST['empresa']['IDEmpresa']));
                $movimientoCisternaController->update($movimientoCisterna);
            } else {
                echo "Campos incompletos.";
            }
            break;
    }
}

if (isset($_GET['action'])) {
    $movimientoCisternaController = new MovimientoCisternaController();
    require_once('../model/MovimientoCisterna.php');
    switch ($_GET['action']) {
        case ('index'):
            $error = null;
            if (!empty($_GET['error'])) {
                $error = $_GET['error'];
            }
            $movimientoCisternaController->index($error);
            break;
            case ('register'):
            $error = null;
            if (!empty($_GET['error'])) {
                $error = $_GET['error'];
            }
            $movimientoCisternaController->register($error);
            break;
        case ('delete'):
            if (!empty($_GET['id'])) {
                $movimientoCisternaController->delete(MovimientoCisterna::findById($_GET['id']));
            } else {
                echo "Campos incompletos.";
            }
            break;
    }
}
?>