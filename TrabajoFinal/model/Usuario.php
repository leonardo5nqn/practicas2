<?php
    //LLAMO A LA CLASE CONEXION
    require_once ("utils/conexion.php");

    class Usuario extends conexion
    {
        var $usuario;
        var $password;
        
        //CREO EL CONSTRUCTOR
        function __construct(){
            parent:: __construct();
        }
        

        function validoUsuario($usuario,$password){
            
            //$usuario=$_POST["Usuario"];
            //$password=$_POST["Password"];
            $sql="SELECT * FROM Usuario WHERE ((NombreUsuario='$usuario')AND(Contrasena='$password'))";
            $respuesta=$this->conn->query ($sql);

            return ($respuesta);
        }
        //crear un return
        //devolver a damian una instancia del objeto
    }?>