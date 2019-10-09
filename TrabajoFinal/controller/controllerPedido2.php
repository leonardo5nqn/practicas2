<?php 
class PedidoController
{	
    public function __construct(){}
    
    public function index(){
        require_once('../model/Pedido.php');
        $pedidos = Pedido::findAll();
        var_dump("Ruta a la vista + datos:".$pedidos);
    }
    
    public function nuevo(){
        echo 'ir a la ruta de creacion de pedido';
    }
    
    public function insert($pedido){
        require_once('../model/Pedido.php');
        var_dump("insert: ".$pedido->insert()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function update($pedido){
        require_once('../model/Pedido.php');
        var_dump("update: ".$pedido->update()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function delete($pedido){
        require_once('../model/Pedido.php');
        var_dump("delete: ".$pedido->delete()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
}

if (isset($_POST['action'])) {
    $pedidoController = new PedidoController();
    require_once('../model/Pedido.php');
    require_once('../model/Solicitante.php'); 
    require_once('../model/Usuario.php'); 
    switch ($_POST['action']){
        case ('nuevo'):
        if (!empty($_POST['Solicitante']) && !empty($_POST['Usuario']) && !empty($_POST['Descripcion']) && !empty($_POST['FechaHora'])) {
            $pedido = new Pedido(null, Solicitante::findByID($_POST['Solicitante']['idSolicitante']), Usuario::findByID($_POST['Usuario']['idUsuario']), $_POST['Descripcion'], $_POST['FechaHora']);
            $pedidoController->insert($pedido);
        } else {
            echo "Campos incompletos.";
        }
        break;
        case ('eliminar'):
        if (!empty($_POST['pedidoID'])) {
            $pedidoController->delete(Pedido::findById($_POST['pedidoID']));
        } else {
            echo "Campos incompletos.";
        }
        break;
        case ('editar'):
            if (!empty($_POST['pedidoID'])){
                $pedido = new Pedido($_POST['pedidoID'], Solicitante::findByID($_POST['Solicitante']['idSolicitante']), Usuario::findByID($_POST['Usuario']['idUsuario']), $_POST['Descripcion'], $_POST['FechaHora'])
                $pedidoController->update($pedido);
        } else {
            echo "Campos incompletos.";
        }
        break;
    }
}

if (isset($_GET['action'])) {
    $pedidoController = new PedidoController();
    require_once('../model/Pedido.php'); 
    switch ($_GET['action']){
        case ('index'):
             $pedidoController->index();
        break;
    }
}
?>
