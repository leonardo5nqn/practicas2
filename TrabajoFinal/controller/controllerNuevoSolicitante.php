<?php
class NuevoSolicitante
{	
    public function __construct(){}
    
    public function index(){
        require_once('../model/Persona.php');
        $personas = Persona::findAll();
        require_once('../view/viewPersona.php');
    }
    
    public function nuevo(){
        echo 'ir a la ruta de creacion de persona';
    }
    
    public function insertar($persona, $empresa){
        require_once('../model/Persona.php');
       
            $persona->insert();
            $solicitante = new Solicitante('NULL', $persona,$empresa);
            $solicitante->insert();
            header("Location: http://localhost/TrabajoFinal/view/viewSolicitantesEmpresa.php");

    }
    public function insert($solicitante){
        if ($solicitante->insert()){
            header("Location: http://localhost/TrabajoFinal/view/viewSolicitantesEmpresa.php");
        }

    }
    public function viewIdEmpresa($id) {
        require_once('../model/Empresa.php');
        $empresa = Empresa::findById($id);
        require_once('../view/viewSolicitantesEmpresa.php');
    }
}

if (isset($_POST['action'])) {
    $nuevoSolicitante = new NuevoSolicitante();
    require_once('../model/Persona.php');
    require_once('../model/Solicitante.php');
// a traves del metodo POST viaja la informacion insertada en un formulario
switch ($_POST["action"]){
    case ('nuevo'):
    if (!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Telefono']) && !empty($_POST['Documento'])
        && !empty($_POST['FechaNacimiento']) && !empty($_POST['Domicilio']) && !empty($_POST['Email']))
        {
            $persona = new Persona(NULL,$_POST['Nombre'],$_POST['Apellido'],$_POST['Telefono'],$_POST['Documento'],$_POST['FechaNacimiento'],$_POST['Domicilio'],$_POST['Email']);
           $empresa =  Empresa::findByID($_POST['IDEmpresa']);
            $nuevoSolicitante->insertar($persona,$empresa);
            
            echo "se inserto"; 
        }
        else
        {
            echo "es necesario que completes los campos";
        }
    
    break;

}
}
if (isset($_GET['action'])) {
    $nuevoSolicitante = new NuevoSolicitante();
    require_once('../model/Persona.php'); 
    require_once('../model/Solicitante.php');
    switch ($_GET['action']){
        case ('index'):
             $personaController->index();
        break;

    case ('idempresa'):
        if (!empty($_GET['id'])){
            $nuevoSolicitante->viewIdEmpresa(($_GET['id']));
        } else {
            echo "Campos incompletos.";
        }
        break;
    }
}
?>