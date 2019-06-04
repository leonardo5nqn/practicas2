<?php
    //LLAMO A LA CLASE CONEXION
    require_once ("utils/conexion.php");

    class Usuario extends conexion
    {
        $usuario;
        $password;
        
        //CREO EL CONSTRUCTOR
        function __construc(){
            parent:: __construc();
        }
        

        function validoUsuario($usuario,$password)
        {
            $usuario=$_POST["usuario"];
            $password=$_POST["contrasena"];
            $sql="SELECT * FROM Usuario WHERE ((Nombre Usuario=$usuario)AND(Contrasena=$password))";
            $respuesta=$this->conn->query ($sql);

        }
        //crear un return
        //devolver a damian una instancia del objeto
    }?>