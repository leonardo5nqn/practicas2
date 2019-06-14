<?php
//llamo a la calse model vehiculo
include "../model/Vehiculo.php";

    switch ($_POST["accion"]){
        case ('nuevo'):
       
            if (!empty($_POST['Patente']) && !empty($_POST['Marca']) && !empty($_POST['Modelo'])&& !empty($_POST['Color'])&& !empty($_POST['TipoVehiculo']))
            {
                if (Vehiculo::insertVehiculo($_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']))
                {
                print_r($_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']);
                }
            }
            else
            {
                echo "es necesario que completes los campos";
            }
        
        break;
        case ('eliminar'):
        
            if (!empty($_POST["Vehiculoid"]))
            {
                if (Vehiculo::deleteVehiculo ($_POST["Vehiculoid"]))
            {
                echo 'vehiculo eliminado';
            }
            }
            else
            {
                echo "error, no se pudo eliminar el vehiculo";
            }
        
        break;
        case ('editar'):
        
            if (!empty($_POST["Vehiculoid"]) && !empty($_POST['Patente']) && !empty($_POST['Marca']) && !empty($_POST['Modelo'])&& !empty($_POST['Color'])&& !empty($_POST['TipoVehiculo']))
            {
                if (Vehiculo::updateVehiulo ($_POST["Vehiculoid"], $_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']))
            {
                print_r($_POST["Vehiculoid"], $_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']); 
            }
            }
            
        
        break;
        case ('mostrar'):
        
            if (Vehiculoid($_POST["Vehiculoid"]))
            {
                if (Vehiculo::getAllVehiculos())
            {
               Vehiculo::getAllVehiculos();
            }
            }
        
        break;   
    }
?>