<?php
//--------------------------------------------
//LLAMO A LA CLASE EMPRESA
//--------------------------------------------
//require_once ("../view/vistaEmpresa.php");
require_once ("../model/Empresa.php");

//pruebas de Controler
//$_POST["accion"]="nuevo";
//$_POST["accion"]="listar";
//$_POST["accion"]="eliminar";

//Asiganacion de las varias POST
$_POST['txt_razonSocial'] = 'Ddimo' ;
$_POST['txt_Cuit']='22224';
$_POST['txt_Direccion']='belmote 263';
$_POST['txt_Telefono']= '536382';

//Utilizo el motodo post para obtener datos de formulario. Y luego establecerlos en el servidor.
switch ($_POST["accion"])
{
    //-------------------------------------------------------------
    //$IDEmpresa, $_razonSocial, $_Cuit, $_Direccion, $_Telefono
    //________________________________________----------------------
    case ('nuevo'):
        //genero la instancia del objeto Empresa
        $obj_empresa = new Empresa ('null',$_POST['txt_razonSocial'], $_POST['txt_Cuit'], $_POST['txt_Direccion'],$_POST['txt_Telefono']);

        //utilizo el !empty para veificar que una variable no este nula
        if (!empty($_POST['txt_razonSocial']) && !empty($_POST['txt_Cuit']) && !empty($_POST['txt_Direccion'])&& !empty($_POST['txt_Telefono']))
        {

            //if (Empresa::insert($_POST["txt_razonSocial"],$_POST["txt_Cuit"],$_POST['txt_Direccion'],$_POST['txt_Telefono'])
            if ($obj_empresa->insert());
            {
                //echo "Una Empresa Insertada";
                echo "<script>javascript:alert('La empresa se ingreso corectamente!!!');window.location='ControllerEmpresa.php';</script>";
                var_dump($obj_empresa);
                //print_r($_POST["txt_razonSocial"],$_POST["txt_Cuit"],$_POST['txt_Direccion'],$_POST['txt_Telefono']);
            }
        }
        else
        {
            echo "faltan datos para Guardar en base de datos";
            var_dump($obj_empresa);
        }

    break;

    case ('eliminar'):
        $_POST['txt_IDEMpresa'] = '0' ;
        $reso = Empresa::findAll()[$_POST['txt_IDEMpresa']]->delete();
        var_dump($reso);
        echo "se elimino una empresa";
        // if (!empty($_POST["IDEmpresa"]))
        // {
        //     if (Empresa::delete($_POST["txt_IDEmpresa"]))
        //     {
        //     $obj_empresa = new Empresa(setIDEmpresa);
        //     $obj_empresa =setIDEmpresa($_POST["txt_IDEmpresa"]);
        //     echo 'Empresa eliminada';
        //     var_dump ($_POST);
        //     }
        // }
        // else
        // {
        //     echo "error, no se pudo eliminar la empresa";
        // }

    break;

    case ('listar'):
        //$obj_empresa=null;
        //echo $obj_empresa;
        $reso = Empresa::findAll();
        var_dump ($reso);
        // if ($obj_empresa->findAll())
        // {
        //     echo "objeto cargado con empresas";
        //     var_dump($obj_empresa);
        //     //$lista=$obj_empresa;

        //     print_r($lista);
        //     header('Location: /TrabajoFinal/view/listarEmpresas.php');

        // }
    break;

}
?>