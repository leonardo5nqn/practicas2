<?php
require_once('../model/Pedido.php');
require_once('../model/Usuario.php');
require_once('../model/Solicitante.php');
require_once('../model/Vehiculo.php');
require_once('../model/PedidoVehiculoChofer.php');
session_start(); //Iniciamos la Sesion o la Continuamos

// require ('../utils/conexion.php');
class PedidoController
{
    public function __construct()
    {
    }


    /**
     * Recupera todos los pedidos de la base de datos y lo muestra en viePedidoIndex
     * que contiene una tabla de pedidos
     */
    public function index()
    {
        $pedidos = Pedido::findAll();
        require_once('../view/viewPedidoIndex.php');

    }

    /**
     * Muestra un Formulario para cargar nuevos pedidos.
     * Busca los solicitantes y los usuarios para rellenar los combobox
     */
    public function nuevo()
    {
        $solicitantes = Solicitante::findAll();
        $usuarios = Usuario::findAll();
        $vehiculos = Vehiculo::findAll();
        require_once('../view/viewPedidoNew.php');

    }

    /**
     * Guardando los datos del nuevo pedido del controlador "nuevo"
     */
    public function insert($pedido, $usuarioIDChofer, $VehiculoID)
    {
        if ($pedido->insert()) {
            $pedidoVehiculoChofer = new PedidoVehiculoChofer(null, $usuarioIDChofer,
                $VehiculoID, $pedido->getID());
            if ($pedidoVehiculoChofer->insert()) {
                echo "OPERACION EXITOSA";
            }
        }
    }

    /**
     * Busca el pedido por ID y muestra el formulario para editar sus datos
     * Busca los solicitantes y los usuarios para rellenar los combobox
     */
    public function update($IDPedido)
    {
        $pedido = Pedido::findById($IDPedido);
        $solicitantes = Solicitante::findAll();
        $usuarios = Usuario::findAll();
        require_once('../view/viewPedidoEdit.php');
    }

    /**
     * GUarda en la base de ddatos el pedido modificado
     */
    public function save($pedido)
    {
        echo $pedido->update();
    }

    public function confirmDelete($IDPedido)
    {
        require_once('../view/viewPedidoDelete.php');
//        require_once('../model/Pedido.php');
//        if (strpos($pedido->delete(), 'Error') === 0) {
//            header('Location: controllerPedido.php?action=index&error=' . $pedido->getID());
//        } else {
//            header('Location: controllerPedido.php?action=index');
//        }
    }

    public function delete($pedido)
    {
        $pedidoVehiculoChoferLista = PedidoVehiculoChofer::findAllWhere('PedidoID = ' . $pedido->getID());
        for ($i = 0; $i < count($pedidoVehiculoChoferLista); $i++) {
            $pedidoVehiculoChoferLista[$i]->delete();
        }
        echo $pedido->delete();
    }
}

// ACCEDIENDO A LA BASE DE  DATOS
if (isset($_POST['action'])) {
    $pedidoController = new PedidoController();
    switch ($_POST['action']) {
        case ('nuevo'):
            // Guardando datos en la base de datos
            if (!empty($_POST['IDSolicitante']) && !empty($_POST['UsuarioID'])
                && !empty($_POST['Descripcion']) && !empty($_POST['FechaHora'])
                && !empty($_POST['VehiculoID'])
            ) {
                $unSolicitante = Solicitante::findByID($_POST['IDSolicitante']);
                $unUsuarioPedido = Usuario::findByID($_SESSION['IDUsuario']);
                $pedido = new Pedido(null, $unSolicitante, $unUsuarioPedido, $_POST['Descripcion'], $_POST['FechaHora']);
                $pedidoController->insert($pedido, $_POST['UsuarioID'], $_POST['VehiculoID']);
            } else {
                echo "<span style='color:red;'>Campos incompletos.</span>";
            }
            break;

        case ('update'):
            // Actualizando datos en la base de datos
            if (!empty($_POST['IDPedido']) && !empty($_POST['IDSolicitante']) && !empty($_POST['idUsuario'])
                && !empty($_POST['Descripcion']) && !empty($_POST['FechaHora'])
            ) {
                $unSolicitante = Solicitante::findByID($_POST['IDSolicitante']);
                $unUsuario = Usuario::findByID($_POST['idUsuario']);
                $pedido = new Pedido($_POST['IDPedido'], $unSolicitante, $unUsuario,
                    $_POST['Descripcion'], $_POST['FechaHora']);
                $pedidoController->save($pedido);
            } else {
                echo "<span style='color:red;'>Campos incompletos.</span>";
            }
            break;
        case ('delete'):
            if (!empty($_GET['id'])) {
                $pedido = Pedido::findById($_GET['id']);
                $pedidoController->delete($pedido);
            } else {
                echo "Campos incompletos.";
            }
            break;
    }
}
// INICIANDO VISTA
if (isset($_GET['action'])) {
    $pedidoController = new PedidoController();
    switch ($_GET['action']) {
        case ('listar'): {
            // Mostrando la vista listar pedido
            $pedidoController->index();
            break;
        }
        case ('nuevo'): {
            // Mostrando la vista con el formulario para cargar pedido
            $pedidoController->nuevo();
            break;
        }
        case ('update'):
            // Mostrando la vista con el formulario para editar un pedido. Comprueba que exista el id
            // para buscar el pedido a editar y rellenar el formulario
            if (!empty($_GET['id'])) {
                $pedidoController->update($_GET['id']);
            } else {
                echo "Campos incompletos.";
            }
            break;
        case ('confirmDelete'):
            if (!empty($_GET['id'])) {
//                $pedido = Pedido::findById($_GET['id']);
                $pedidoController->confirmDelete($_GET['id']);
            } else {
                echo "Campos incompletos.";
            }
            break;

        default:
            echo 'LA URL INGRESADA NO EXISTE';
            break;
    }
}
?>