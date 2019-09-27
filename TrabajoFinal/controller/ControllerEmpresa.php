<?php
//--------------------------------------------
//LLAMO A LA CLASE EMPRESA
//--------------------------------------------
require_once ("../model/Empresa.php");

//Comienzo a recopilar los valores del metodo POST.
switch ($_POST["accion"])
{
    case ('nuevo'):
   
        if (!empty($_POST['razonSocial']) && !empty($_POST['Cuit']) && !empty($_POST['Direccion'])&& !empty($_POST['Telefono']))
        {
            if (Empresa::insert($_POST["razonSocial"],$_POST["Cuit"],$_POST['Direccion'],$_POST['Telefono'])
            {
            print_r($_POST["razonSocial"],$_POST["Cuit"],$_POST['Direccion'],$_POST['Telefono']);
            }
        }
        else
        {
            echo "es necesario que completes los campos";
        }
    
    break;
    case ('eliminar'):
    
        if (!empty($_POST["IDEmpresa"]))
        {
            if (Empresa::delete($_POST["IDEmpresa"]))
        {
            echo 'Empresa eliminada';
        }
        }
        else
        {
            echo "error, no se pudo eliminar la empresa";
        }
    
    break;
    case ('editar'):
    
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