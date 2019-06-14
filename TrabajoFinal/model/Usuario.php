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
        private $IDPersona;
        private $Nombre;
        private $Apellido;
        private $Telefono;
        private $Documento;
        private $FechaNacimiento;
        private $Domicilio;
        private $Email;
        private $id;

    
    
        




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

        //Para crear un nuevo usuario es necesario tener la persona
        //Para ello se hará el insert de la persona para luego crear el usuario 
        static function insertPersona($IDPersona, $Nombre, $Apellido, $Telefono, $Documento, $FechaNacimiento, $Domicilio, $Email)
        {
              Conexion::conectar()->query("INSERT INTO Persona (IDPersona, Nombre, Apellido, Telefono, Documento, FechaNacimiento, Domicilio, Email)
            values ('$IDPersona', '$Nombre', '$Apellido', '$Telefono', '$Documento', '$FechaNacimiento', '$Domicilio', '$Email')");
                
        }

        
        //Listado de personas
        static function mostrarUsuario(){
                Conexion::conectar()->query("SELECT *from Usuario");
        }

        
        //Crear nuevo usuario
         static function insertUsuario($id, $idRol, $usuario, $password, $huella){
            Conexion::conectar()->query ("INSERT INTO Usuario (PersonaID, RolID, NombreUsuario, Contrasena, Huella)
            values ('$id','$idRol','$usuario','$password','$huella')");
        }

        static function deletUsuario($idUsuario){
            Conexion::conectar()->query("DELETE FROM Usuario where IDUsuario = $idUsuario");
        }
        
        static function updateUsuario($idUsuario, $usuario, $password){
            Conexion::conectar()->query("UPDATE Usuario set  NombreUsuario = '$usuario', Contrasena = '$password' where IDUsuario = $idUsuario");
        }

    
    }?>