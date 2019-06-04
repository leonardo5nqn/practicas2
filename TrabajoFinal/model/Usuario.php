<?php
    //LLAMO A LA CLASE CONEXION
    require_once ("utils/conexion.php");

    class Usuario extends conexion
    {
        var $usuario;
        var $password;
        
        //CREO EL CONSTRUCTOR
        function __construc(){
            parent:: __construc();
        }
        

        function validoUsuario($usuario,$password){
            
            $usuario=$_POST["Usuario"];
            $password=$_POST["Password"];
            $sql="SELECT * FROM Usuario WHERE ((Nombre Usuario=$usuario)AND(Contrasena=$password))";
            $respuesta=$this->conn->query ($sql);

            return ($respuesta);
        }
        //crear un return
        //devolver a damian una instancia del objeto
    }?>