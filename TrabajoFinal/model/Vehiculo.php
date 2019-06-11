<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

class Vehiculo 
{
    var $marca;
    var $modelo;
    var $color;
    var $numPatente;
    var $tipoVehiculo;
    var $id;

    function insertVehiculo ($numPatente, $marca, $modelo, $color, $tipoVehiculo)
    {
        $sql = ("INSERT INTO Vehiculo (Patente, Marca, Modelo, Color, TipoVehiculo)
        values ('$numPatente', '$marca', '$modelo', '$color', '$TipoVehiculo')");
        $respuesta=$this->conn->query ($sql);
         
        return ($respuesta);
    }

    function deleteVehiculo ($id)
    {
        $this->conn->query("DELETE from where IDVehiculo = $id");
    }

    function updateVehiulo($numPatente, $marca, $modelo, $color, $tipoVehiculo, $vehiculoID)
    {

      $this->conn->query("UPDATE Vehiculo set Patente = '$numPatente', Marca = '$marca', Modelo = '$modelo', Color = '$color', TipoVehiculo = '$tipoVehiculo'
        where IDVehiculo = $vehiculoID");
    }

}







?>