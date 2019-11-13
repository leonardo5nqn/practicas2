<?php 
class SolicitanteController
{	
    public function __construct(){}

    public function index($error){
        require_once('../model/Solicitante.php');
        $solicitantes = Solicitante::findAll();
        require_once('../view/viewSolicitanteIndex.php');   
    }
    public function nuevo(){
        echo 'ir a la ruta de creacion de pedido';
    }
    public function insert($solicitante){
        if ($solicitante->insert()){
            header("Location: http://localhost/TrabajoFinal/view/viewSolicitantesEmpresa.php");
        }
        //require_once('../model/Solicitante.php');
        //var_dump($solicitante);
        //header('Location: ../index.php');
    }
    public function update($solicitante){
        require_once('../model/Solicitante.php');
        var_dump("update: ".$solicitante->update()." e ir al index de vista.");

        //header('Location: ../index.php');
    }
    public function delete($solicitante){
        require_once('../model/Solicitante.php');
        if(strpos($solicitante->delete(), 'Error') === 0) { 
            header('Location: controllerSolicitante.php?action=index&error='.$solicitante->getIDSolicitante());
        } else { 
            header('Location: controllerSolicitante.php?action=index');
        }
    }
    public function ver(){
        require_once('../model/Solicitante.php');
        $solicitantes = Solicitante::findAll();
        //$solicitantes = [new Solicitante (null,'hola','chau')];
        return ($solicitantes);
    }
}

if (isset($_POST['action'])) {
    $solicitanteController = new SolicitanteController();
    require_once('../model/Solicitante.php'); 
    require_once('../model/Empresa.php'); 
    require_once('../model/Persona.php'); 
    switch ($_POST['action']){
        case ('new'):
        if (!empty($_POST['IDPersona']) && !empty($_POST['IDEmpresa'])) {
            $solicitante = new Solicitante('NULL', Persona::findByID($_POST['IDPersona']), Empresa::findByID($_POST['IDEmpresa']));
            $solicitanteController->insert($solicitante);
        } else {
            echo "Campos incompletos.";
        }
        break;
        
        case ('update'):
        if (!empty($_POST['idSolicitante'])){
            $solicitante = new Solicitante($_POST['idSolicitante'], Persona::findByID($_POST['persona']['personaid']), Empresa::findByID($_POST['empresa']['IDEmpresa']));
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
        $error = null;
        if (!empty($_GET['error'])) {
            $error = $_GET['error'];
        } 
        $solicitanteController->index($error);
        break;
        case ('delete'):
        if (!empty($_GET['id'])) {
            $solicitanteController->delete(Solicitante::findById($_GET['id']));
        } else {
            echo "Campos incompletos.";
        }
        break;
    }
}
?>