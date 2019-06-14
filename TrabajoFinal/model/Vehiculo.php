<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

class Vehiculo 
{
   private $marca;
   private $modelo;
   private $color;
   private $numPatente;
   private $tipoVehiculo;
   private $id;

    static function insertVehiculo($numPatente, $marca, $modelo, $color, $tipoVehiculo)
    {
        $respuesta = Conexion::conectar()->query("INSERT INTO Vehiculo (Patente, Marca, Modelo, Color, TipoVehiculo)
        values ('$numPatente', '$marca', '$modelo', '$color', '$tipoVehiculo')");
         
        return ($respuesta);
    }

    static function deleteVehiculo ($id)
    {
        Conexion::conectar()->query("DELETE from Vehiculo where IDVehiculo = $Vehiculoid");
    }

    static function updateVehiulo($numPatente, $marca, $modelo, $color, $tipoVehiculo, $VehiculoID)
    {

        Conexion::conectar()->query("UPDATE Vehiculo set IDVehiculo = '$Vehiculoid', Patente = '$numPatente', Marca = '$marca', Modelo = '$modelo', Color = '$color', TipoVehiculo = '$tipoVehiculo'
        where IDVehiculo = $Vehiculoid");
    }

    static function getAllVehiculos(){
        Conexion::conectar()->query("SELECT * from Vehiculo");
    }
}
?>