<?php
class PersonaController
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
    
    public function insert($persona){
        require_once('../model/Persona.php');
        var_dump("insert: ".$persona->insert()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function update($persona){
        require_once('../model/Persona.php');
        var_dump("update: ".$persona->update()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function delete($persona){
        require_once('../model/Persona.php');
        var_dump("delete: ".$persona->delete()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function ver(){
        require_once('../model/Persona.php');
        $personas = Persona::findAll();
        return ($personas);
    }
}

if (isset($_POST['action'])) {
    $personaController = new PersonaController();
    require_once('../model/Persona.php');
// a traves del metodo POST viaja la informacion insertada en un formulario
switch ($_POST["action"]){
    case ('nuevo'):
    if (!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Telefono']) && !empty($_POST['Documento'])
        && !empty($_POST['FechaNacimiento']) && !empty($_POST['Domicilio']) && !empty($_POST['Email']))
        {
            $persona = new Persona(NULL,$_POST['Nombre'],$_POST['Apellido'],$_POST['Telefono'],$_POST['Documento'],$_POST['FechaNacimiento'],$_POST['Domicilio'],$_POST['Email']);
            $personaController->insert($persona);
            echo "se inserto"; 
        }
        else
        {
            echo "es necesario que completes los campos";
        }
    
    break;
    case ('editar'):
    if (!empty($_POST["IDPersona"]))
        {
            $persona = new Persona($_POST["IDPersona"],$_POST['Nombre'],$_POST['Apellido'],$_POST['Telefono'],$_POST['Documento'],$_POST['FechaNacimiento'],$_POST['Domicilio'],$_POST['Email']);
            $personaController->update($persona);
            echo "se edito una persona";
        }
        else
        {
            echo "error, no se pudo editar";
        }
        
    
    break;

}
}
if (isset($_GET['action'])) {
    $personaController = new PersonaController();
    require_once('../model/Persona.php'); 
    switch ($_GET['action']){
        case ('index'):
             $personaController->index();
        break;

        case ('eliminar'):
    if (!empty($_GET['id'])) { 
        $personaController->delete(Persona::findById($_GET['id']));
        echo 'persona eliminada';
    }
    break;
    }
}
?>