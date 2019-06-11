<?php
    //LLAMO A LA CLASE CONEXION
    require_once ("../utils/conexion.php");

    class Usuario 
    {
        private  $usuario;
        private  $password;
        private  $idUsuario;
        private  $idPersona;
        private  $idRol;
        private  $huella;



        static function validoUsuario($usuario,$password){
            
            //$usuario=$_POST["Usuario"];
            //$password=$_POST["Password"];
            $sql="SELECT * FROM Usuario WHERE ((NombreUsuario='$usuario')AND(Contrasena='$password'))";
            $respuesta=$this->conn->query ($sql);

            return ($respuesta);
        }
        //crear un return
        //devolver a damian una instancia del objeto

         static function insertUsuario($idPersona, $idRol, $usuario, $password, $huella){
            
            $this->conn->query("INSERT INTO Usuario (PersonaID, RolID, NombreUsuario, Contrasena, Huella)
            values ('$idPersona','$idRol','$usuario','$password','$huella')");

        }

        static function deletUsuario($idUsuario){
            $this->conn->query("DELETE FROM Usuario where IDUsuario = $idUsuario");
        }
        
        static function updateUsuario($idUsuario, $usuario, $password){
            $this->conn->quert("UPDATE Usuario set $usuario, $password where IDUsuario = $idUsuario");
        }



    }?>