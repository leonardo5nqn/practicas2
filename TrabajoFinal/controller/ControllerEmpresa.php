<?php
//--------------------------------------------
//LLAMO A LA CLASE EMPRESA
//--------------------------------------------
require_once ("../view/vistaEmpresa.php");
require_once ("../model/Empresa.php");

//Utilizo el motodo post para obtener datos de formulario. Y luego establecerlos en el servidor.
switch ($_POST["accion"])
{
    case ('nuevo'):
        //genero la instancia del objeto Empresa
        $obj_empresa = new Empresa (null,$_POST['txt_razonSocial'], $_POST['txt_Cuit'], $_POST['txt_Direccion'],$_POST['txt_Telefono']);

        //utilizo el !empty para veificar que una variable no este nula
        if (!empty($_POST['txt_razonSocial']) && !empty($_POST['txt_Cuit']) && !empty($_POST['txt_Direccion'])&& !empty($_POST['txt_Telefono']))
        {   
            
            //if (Empresa::insert($_POST["txt_razonSocial"],$_POST["txt_Cuit"],$_POST['txt_Direccion'],$_POST['txt_Telefono'])
            if ($obj_empresa->insert());
            {   
                echo "Una Empresa Insertada";
                var_dump($obj_empresa);
                print_r($_POST["txt_razonSocial"],$_POST["txt_Cuit"],$_POST['txt_Direccion'],$_POST['txt_Telefono']);
            }
        }
        else
        {
            echo "faltan datos para Guardar en base de datos";
            var_dump($obj_empresa);
        }
    
    break;

    case ('eliminar'):
    
        if (!empty($_POST["IDEmpresa"]))
        {
            if (Empresa::delete($_POST["txt_IDEmpresa"]))
            {   
            $empre = new Empresa(setIDEmpresa);
            $empre =setIDEmpresa($_POST["txt_IDEmpresa"]);
            echo 'Empresa eliminada';
            var_dump ($_POST);
            }
        }
        else
        {
            echo "error, no se pudo eliminar la empresa";
        }
    
    break;

    case ('listar'):
    
        if (!empty($_POST["IDEmpresa"]))
        {
            if (Empresa::update ($_POST["razonSocial"], $_POST["Cuit"],$_POST["Direccion"],$_POST['Telefono'])
        {
            print_r($_POST["razonSocial"], $_POST["Cuit"],$_POST["Direccion"],$_POST['Telefono']); 
        }
        else
        {
            echo "No se pudo actualizar la empresa";
        }
        }
    break;

}
?>