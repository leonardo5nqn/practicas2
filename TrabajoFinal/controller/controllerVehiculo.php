<?php
include "../model/Vehiculo.php";
if($_POST["accion"]==='nuevo'){
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
}


if($_POST["accion"]==='eliminar'){
    if ($VehiculoID = "IDVehiculo")
    {
        if (Vehiculo::deleteVehiculo ($_POST["IDVehiculo"]))
    {
        echo 'vehiculo eliminado';
    }
    }
    else
    {
        echo "error, no se pudo eliminar el vehiculo";
    }
}



if($_POST["accion"]==='editar'){
    if ($VehiculoID = "IDVehiculo")
    {
        if (Vehiculo::updateVehiulo ($_POST["IDVehiculo"]))
    {
        print_r($_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']); 
    }
    }
}


if($_POST["accion"]==='mostrar'){
    if ($VehiculoID = "IDVehiculo")
    {
        if (Vehiculo::getAllVehiculos())
    {
       Vehiculo::getAllVehiculos();
    }
    }
}



?>