<?php
    //CREADO LA CLASE DE CONEXION
    class Conexion
    {
        private static $instance = null;
        
        //AGREGO LA CONEXION A LA BASE DE DATOS
        const host="db4free.net";
        const usuario="admcisterna";
        const pass="cisterna2019nqn";
        const nameBD="cisterna";

        function __construct()
        {
         self::$instance = new mysqli(host,usuario,pass,nameBD);   
        }

       public static function conectar () {
             if(self::$instance == null){
                 self::$instance = new Conexion();
             }
             return self::$instance;
        }
        
        public static function cerrarConexion(){
            self::$instance->session_write_close();
            self::$instance = null;
        }
    }
?>