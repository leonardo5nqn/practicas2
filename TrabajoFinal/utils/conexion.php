<?php
    //CREADO LA CLASE DE CONEXION
    class Conexion
    {
        private static $instance = null;
        
        //AGREGO LA CONEXION A LA BASE DE DATOS
        private static $host ="db4free.net:3306";
        private static $usuario="admcisterna";
        private static $pass="cisterna2019nqn";
        private static $nameBD="cisterna";

        function __construct()
        {
            self::$instance = new mysqli(self::$host,self::$usuario,self::$pass,self::$nameBD);
        }

       public static function conectar() {
             if(self::$instance == null){
                new Conexion();
             }
             return self::$instance;
        }
        
        public static function cerrarConexion(){
            self::$instance->session_write_close();
            self::$instance = null;
        }

       
    }
?>  