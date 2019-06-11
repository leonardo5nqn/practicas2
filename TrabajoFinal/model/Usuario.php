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
            
            //
            $sql="SELECT * FROM Usuario WHERE ((NombreUsuario='$usuario')AND(Contrasena='$password'))";
            $respuesta = Conexion::conectar() -> query ($sql);
            
            print_r($respuesta);

            if($respuesta != null){
                return (new Usuario($respuesta->nombre,$respuesta->password));
                //averiguar como pasar la respuesta a variables.
            }
            else return null;
           
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