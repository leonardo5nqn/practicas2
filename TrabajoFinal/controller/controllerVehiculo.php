<?php
include "../model/Vehiculo.php";

if(!empty($_POST['Patente']) && !empty($_POST['Marca']) && !empty($_POST['Modelo'])&& !empty($_POST['Color'])&& !empty($_POST['TipoVehiculo'])) 
{
    if (Vehiculo::insertVehiculo ($_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']))
    {
    print_r($_POST["Patente"],$_POST["Marca"],$_POST['Modelo'],$_POST['Color'],$_POST['TipoVehiculo']);
    }
}
else 
{
    echo "es necesario que completes los campos";
}

if ($VehiculoID = "IDVehiculo")
{
    if (Vehiculo::deleteVehiculo ($_POST["IDVehiculo"]))
    {
        print_r($_POST["IDVehiculo"]);
    }

}







exit();





?>