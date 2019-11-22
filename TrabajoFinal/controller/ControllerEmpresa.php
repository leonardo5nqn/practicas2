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
        if ($empresa->insert()){
        $this->index();
        // header("Location: http://localhost/TrabajoFinal/view/viewEmpresaSolicitante.php");
        }
        
    }
        
    
    public function viewUpdate($id) {
        require_once('../model/Empresa.php');
        $empresa = Empresa::findById($id);
        require_once('../view/viewModificarEmpresa.php');
    }
    public function update($empresa){
        if ($empresa->update()){
            header("Location: http://localhost/TrabajoFinal/view/viewEmpresaSolicitante.php");
        }
    }
    public function delete($empresa){
        require_once('../model/Empresa.php');
        $empresa->delete();
        header('Location: ../view/viewEmpresaSolicitante.php');
    }
    public function ver(){
        require_once('../model/Empresa.php');
        $empresas = Empresa::findAll();
        return ($empresas);
    }
    
}


//genero el If para setear el formulario
if(isset($_POST['action'])){
    
    require_once('../model/Empresa.php');
    require_once('../model/Solicitante.php');
    require_once('../model/Usuario.php'); 

    $empresaController = new EmpresaController();

    //genero los switch
    switch ($_POST['action']){
        case ('new'):
            
            //utilizo el !empty para veificar que una variable no este nula
            if (!empty($_POST['razonSocial']) && !empty($_POST['Cuit']) && !empty($_POST['Direccion'])&& !empty($_POST['Telefono']))
            {
                //genero la instancia del objeto Empresa
                $obj_empresa = new Empresa (null,$_POST['razonSocial'], $_POST['Cuit'], $_POST['Direccion'],$_POST['Telefono']);
                $empresaController->insert($obj_empresa);
            }
            else
            {
                echo "faltan datos para Guardar en base de datos";
            }

        break;
        case ('update'):
            if (!empty($_POST['id']) && !empty($_POST['razonSocial']) && !empty($_POST['Cuit']) && !empty($_POST['Direccion'])&& !empty($_POST['Telefono'])){
            $empresa = new Empresa($_POST['id'], $_POST['razonSocial'], $_POST['Cuit'], $_POST['Direccion'],$_POST['Telefono']);
            $empresaController->update($empresa);
            } else {
                echo "Campos incompletos.";
            }
        break;
        
    }
}       

if (isset($_GET['action'])){
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
            case ('update'):
            if (!empty($_GET['id'])){
                $empresaController->viewUpdate(($_GET['id']));
            } else {
                echo "Campos incompletos.";
            }
            break;   
    }
}

?>