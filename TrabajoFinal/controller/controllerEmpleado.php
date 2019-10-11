<?php
//llamo a las clase relacionas con el controller
require_once("../model/Empleado.php");

//declaro las variables del post
//// $_IDEmpleado,  $_personaID, $_fechaIngreso

//$_POST["accion"]="nuevo";
//$_POST["accion"]="listar";
//$_POST["accion"]="eliminar";


//$_POST['']
//$_POST['txt_idEmpresa']='';
$_POST['txt_fechaIngreso']='09102019';

switch ($_POST["accion"]) {
    case 'nuevo':
        

        //valido que las varibles no tengan valores nulos.
        if(!empty($_POST['txt_fechaIngreso'])){

            $obj_empleado =new Empleado ('null','null',$_POST['txt_fechaIngreso']);

            if($obj_empleado->insert()){
                var_dump($obj_empleado);
                echo "se inserto un empleado";
            }
        }
        else{
            echo "faltan datos para Inserta en la BD";
        }
        break;

        case ('eliminar'):
            //seteo la variable en la posicion a aliminar
            $id_obj_eliminar='0';
            $reso = Empleado::findAll([$id_obj_eliminar]->delete());
            var_dump($reso);
            echo "Se elimino un empleado";
        break;

        case ('listar'):
            $reso= Empleado::findAll();
            var_dump ($reso);
            break;
}

?>