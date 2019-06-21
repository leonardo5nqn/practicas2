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
       

        //constructor
        function __construct()
        {
        }

        //metodos get y set Usuario
        public function getUsuario()
        {
            return $this->usuario;
        }
     
        public function setUsuario($us)
        {
            $this->usuario = $us;
        }
        //metodos get y set Password
        public function getPassword()
        {
            return $this->password;
        }
     
        public function setUsuario($pass)
        {
            $this->password = $pass;
        }
        
        //Crear nuevo usuario
        static function insert()
        {
            $respuesta = Conexion::conectar()->query("INSERT INTO Usuario (PersonaID, RolID, NombreUsuario, Contrasena, Huella)
            values (".$this->idUsuario.",".$this->idRol.",".$this->usuario.",".$this->password." ,".$this->huella." )");
            return ($respuesta);
        }
        //eliminar usuario
        static function delete()
        {
            $respuesta = Conexion::conectar()->query("DELETE FROM Usuario where IDUsuario =".$this->idUsuario."");
            return ($respuesta);
        }
        //editar usuario
        static function update()
        {
            $respuesta = Conexion::conectar()->query("UPDATE Usuario set  NombreUsuario =".$this->usuario.", Contrasena =".$this->password." 
            where IDUsuario =".$this->idUsuario."");
            return ($respuesta);
        }

           /* static function validoUsuario($usuario,$password){
            
            //
            $sql="SELECT * FROM Usuario WHERE ((NombreUsuario='$usuario')AND(Contrasena='$password'))";
            $respuesta = Conexion::conectar() -> query ($sql);
            
            print_r($respuesta);

            if($respuesta != null){
                return (new Usuario($respuesta->nombre,$respuesta->password));
                //averiguar como pasar la respuesta a variables.
            }
            else return null;
           
        }*/
       
      

        

    
    }?>