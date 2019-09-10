<?php
    //CREADO LA CLASE DE CONEXION
    class Conexion
    {
        private static $instance = null;
        exit('asd');
        
        //AGREGO LA CONEXION A LA BASE DE DATOS
        private $host ="db4free.net";
        private $usuario="admcisterna";
        private $pass="cisterna2019nqn";
        private $nameBD="cisterna";

        function __construct()
        {
            self::$instance = new mysqli($this->host,$this->usuario,$this->pass,$this->nameBD);
        }

       public static function conectar() {
        var_dump(self::$instance);
        exit();
             if(self::$instance === null){
                 exit('asd');
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