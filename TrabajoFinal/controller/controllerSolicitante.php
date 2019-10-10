<?php 
class SolicitanteController
{	
    public function __construct(){}
    public function index(){
        require_once('../model/Solicitante.php');
        $solicitantes = Solicitante::findAll();
        require_once('../view/viewSolicitanteIndex.php');
    }
    public function nuevo(){
        echo 'ir a la ruta de creacion de pedido';
    }
    public function insert($solicitante){
        require_once('../model/Solicitante.php');
        var_dump("insert: ".$solicitante->insert()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function update($solicitante){
        require_once('../model/Solicitante.php');
        var_dump("update: ".$solicitante->update()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function delete($solicitante){
        require_once('../model/Solicitante.php');
        var_dump("delete: ".$solicitante->delete()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
}
if (isset($_POST['action'])) {
    $solicitanteController = new SolicitanteController();
    require_once('../model/Solicitante.php'); 
    require_once('../model/Empresa.php'); 
    require_once('../model/Persona.php'); 
    switch ($_POST['action']){
        case ('nuevo'):
        if (!empty($_POST['persona']) && !empty($_POST['empresa'])) {
            $solicitante = new Solicitante(null, Persona::findByID($_POST['Persona']['personaid']), Empresa::findByID($_POST['Empresa']['IDEmpresa']));
            $solicitanteController->insert($solicitante);
        } else {
            echo "Campos incompletos.";
        }
        break;
        case ('eliminar'):
        if (!empty($_POST['idSolicitante'])) {
            $solicitanteController->delete(Solicitante::findById($_POST['idSolicitante']));
        } else {
            echo "Campos incompletos.";
        }
        break;
        case ('editar'):
        if (!empty($_POST['idSolicitante'])){
            $solicitante = new Solicitante($_POST['idSolicitante'], Persona::findByID($_POST['Persona']['personaid']), Empresa::findByID($_POST['Empresa']['IDEmpresa']);
            $solicitanteController->update($solicitante);
        } else {
            echo "Campos incompletos.";
        }
        break;
    }
}
if (isset($_GET['action'])) {
    $solicitanteController = new SolicitanteController();
    require_once('../model/Solicitante.php'); 
    switch ($_GET['action']){
        case ('index'):
        $solicitanteController->index();
        break;
    }
}
?>
