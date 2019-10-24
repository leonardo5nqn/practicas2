<?php
//--------------------------------------------------------------
//Me posiciono sobre el Modelo y llamos a la CLASE Empresa.php
//--------------------------------------------------------------
require_once ("../model/Empresa.php");

class EmpresaController
{
    public function __construct(){

    }

    public function index(){
        require_once('../model/Empresa.php');
        $empresa = Empresa::findAll();
        require_once('../view/viewEmpresaIndex.php');
    }

    public function nuevo(){
        echo 'ir a la ruta de creadion de pedido';
    }

    public function insert ($empresa){
        require_once('../model/Empresa.php');
        var_dump("insert:".$empresa->insert()."e ir al index de la vista");
    }
    public function update($empresa){
        require_once('../model/Empresa.php');
        var_dump("update: ".$empresa->update()."e ir al index de la vista");
    }
    public function delete($empresa){
        require_once('../model/Empresa.php');
        if (strpos($empresa->delete(), 'error') === 0){
            header('Location: controllerEmpresa.php?action=index&error'.$empresa->getIDEmpresa());
        } else{
            header('Location:controllerEmpresa.php?action=index');
        }
        //var_dump("delete: ".$empresa->delete(). "e ir al indes de la vista");
    }
    
}


//genero el If para setear el formulario
if(isset($_POST['action'])){
    
    //require_once('EmpresaController.php');
    require_once('../model/Empresa.php');
    require_once('../model/Solicitante.php');
    require_once('../model/Usuario.php'); 

    $empresaController = new EmpresaController();

    //genero los switch
    switch ($_POST['action']){
        case ('new'):
            
            //utilizo el !empty para veificar que una variable no este nula
            if (!empty($_POST['RazonSocial']) && !empty($_POST['Cuit']) && !empty($_POST['Direccion'])&& !empty($_POST['Telefono']))
            {
                //genero la instancia del objeto Empresa
                $obj_empresa = new Empresa (null,$_POST['RazonSocial'], $_POST['Cuit'], $_POST['Direccion'],$_POST['Telefono']);
                $empresaController->insert($obj_empresa);
            }
            else
            {
                echo "faltan datos para Guardar en base de datos";
            }

        break;
    }        
}

if (isset($_GET['action']){
    $empresaController = new EmpresaController();
    switch ($_GET['action']) {
        case 'index':
            $error = null;
            if(!empty($_GET['error'])) {
                $error=$_GET['error'];
            }
            $empresaController->index($error);
            break;
        case ('delete'):
            if (!empty($_GET['id'])) {
                $empresaController->delete(Empresa::findByID($_GET['id']));
            } else {
                echo "Campos incompletos.";
            }
            break;
            
    }
}

?>