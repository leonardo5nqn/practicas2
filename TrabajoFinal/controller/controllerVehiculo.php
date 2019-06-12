<?php
include "../model/Vehiculo.php";

class VehiculoController{

static function insertVehiculo(){
    if(!empty($_POST['Patente']) && !empty($_POST['Marca']) && !empty($_POST['Modelo'])&& !empty($_POST['Color'])&& !empty($_POST['TipoVehiculo'])) 
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

/* 
static function eliminarVehiculo(){
    Conexion::conectar()->query("DELETE from Vehiculo where IDVehiculo = $id");
}

static function editarVehiculo(){
    Conexion::conectar()->query("UPDATE Vehiculo set Patente = '$numPatente', Marca = '$marca', Modelo = '$modelo', Color = '$color', TipoVehiculo = '$tipoVehiculo'
        where IDVehiculo = $vehiculoID");
}

static function getAllVehiculos()
{
if ($VehiculoID = "IDVehiculo")
{
    if (Vehiculo::deleteVehiculo ($_POST["IDVehiculo"]))
    {
        print_r($_POST["IDVehiculo"]);
    }

}
} */
}
?>