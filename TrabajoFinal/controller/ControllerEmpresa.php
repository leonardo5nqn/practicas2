<?php
//--------------------------------------------------------------
//Me posiciono sobre el Modelo y llamos a la CLASE Empresa.php
//--------------------------------------------------------------
require_once ("../model/Empresa.php");

//-----------------------------------------------
//IMPORTANTE DEBO SETEAR UN VALOR AL METODO POST DEL ACCION
//-----------------------------------------------
//PRUEBAS DEL CONTROLLER EMPRESA
//----Descomentar la siguiente linea para verificar (insert,delete, lista estan verificados)

//$_POST["accion"]="nuevo";
//$_POST["accion"]="listar";
//$_POST["accion"]="eliminar";
//$_POST["accion"]="update";

//Asigano valores al metodo _POST
$_POST['txt_razonSocial'] = 'hola' ;
$_POST['txt_Cuit']='63853';
$_POST['txt_Direccion']='ruta 22';
$_POST['txt_Telefono']= '536382';

//Utilizo el motodo post para obtener datos de formulario. Y luego establecerlos en el servidor.
switch ($_POST["accion"])
{

    //-------------------------------------------------------------
    //$IDEmpresa, $_razonSocial, $_Cuit, $_Direccion, $_Telefono
    //________________________________________----------------------

    

    case ('nuevo'):
        
        //utilizo el !empty para veificar que una variable no este nula
        if (!empty($_POST['txt_razonSocial']) && !empty($_POST['txt_Cuit']) && !empty($_POST['txt_Direccion'])&& !empty($_POST['txt_Telefono']))
        {
            //genero la instancia del objeto Empresa
            $obj_empresa = new Empresa ('null',$_POST['txt_razonSocial'], $_POST['txt_Cuit'], $_POST['txt_Direccion'],$_POST['txt_Telefono']);

            
            if ($obj_empresa->insert());
            {
                var_dump($obj_empresa);
                echo "Se ingreso una empresa";
            }
        }
        else
        {
            echo "faltan datos para Guardar en base de datos";
        }

    break;

    case ('eliminar'):
        //seteo la posicion del Objeto
        $id_obj_eliminar='0';
        $reso = Empresa::findAll()[$id_obj_eliminar]->delete();
        var_dump($reso);
        echo "se elimino una empresa";
    break;

    case ('listar'):
        $reso = Empresa::findAll();
        var_dump ($reso);
        
    break;
         case 'update':
                $id_update ='10';
                $reso = Empresa::findByID($id_update);
                //var_dump $reso;
                $reso->setRazonsocial("ChinoL");
                $reso->setDireccion("Rivas 986");
                $reso->update();
                var_dump($reso); exit;
         break;
}
?>