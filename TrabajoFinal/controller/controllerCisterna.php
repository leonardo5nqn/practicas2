<?php
//llamo a la calse model cisterna
include "../model/Cisterna.php";

// a traves del metodo POST viaja la informacion insertada en un formulario
    switch ($_POST["accion"]){
        case ('nuevo'):
        $cisterna = new Cisterna(NULL,$_POST['TotalLitros'],$_POST['NombreCisterna']);
            if (!empty($_POST['TotalLitros']) && !empty($_POST['NombreCisterna']))
            {
                if ($cisterna->insert())
                {
                    echo "se inserto"; 
                }
            }
            else
            {
                echo "es necesario que completes los campos";
            }
        
        break;
        case ('eliminar'):
        $cisterna = new Cisterna($_POST["IDCisterna"],NULL,NULL);
            if (!empty($_POST["IDCisterna"]))
            {
                if ($cisterna->delete ())
            {
                echo 'cisterna eliminada';
            }
            }
            else
            {
                echo "error, no se pudo eliminar cisterna";
            }
        
        break;
        case ('editar'):
        $cisterna = new Cisterna(NULL,$_POST['TotalLitros'],$_POST['NombreCisterna']);
        
            if (!empty($_POST["TotalLitros"]) && !empty($_POST['NombreCisterna']))
            {
                if ($cisterna->update())
            {
                echo "Se edito correctamente";
            }
            }
            else
            {
                echo "error, no se pudo editar cisterna";
            }
            
        
        break;
        case ('mostrar'):
        
                if ($cisterna->findAll())
            {
               Cisterna::findAll();
            }
        
        
        break;
        
    }
?>