<?php
    //CREADO LA CLASE DE CONEXION
    class Conexion
    {
        //AGREGO LA CONEXION A LA BASE DE DATOS
        var $conn;

        function __construct()
        {
            $this -> conn= new mysqli("db4free.net","admcisterna","cisterna2019nqn","cisterna");
        }

    }
?>