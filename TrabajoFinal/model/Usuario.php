<?php
    //LLAMO A LA CLASE CONEXION
    require_once ("../utils/conexion.php");
    require_once ("../model/Persona.php");

    class Usuario extends Persona
    {
        private  $usuario;
        private  $password;
        private  $idUsuario;
        private  $idPersona;
        private  $idRol;
        private  $huella;
       

        //constructor
        public function __construct($_usuario, $_password, $_idUsuario,$_idPersona,$_idRol,$_huella)
     {
      $this->setUsuario($_usuario);
      $this->setPassword($_password);
      $this->setIDUsuario($_idUsuario);
      $this->setidPersona($_idPersona);
      $this->setidRol($_idRol);
      $this->huella = $_huella;
      
     }

        //metodos get y set Usuario
        public function getUsuario()
        {
            return $this->usuario;
        }
        private function setUsuario($us)
        {
            $this->usuario = $us;
        }
        //metodos get y set Password
        public function getPassword()
        {
            return $this->password;
        }
     
        public function setPassword($pass)
        {
            $this->password = $pass;
        }
        //metodos get y set idUsuario
        public function getIDUsuario()
        {
            return $this->idUsuario;
        }
        public function setIDUsuario($id)
        {
            $this->idUsuario = $id;
        }
        
        //metodos get y set idPersona
        public function getidPersona()
        {
            return $this->idPersona;
        }
     
        public function setidPersona($idpersona)
        {
            $this->idPersona = $idpersona;
        }
        //metodos get y set idRol
        public function getidRol()
        {
            return $this->idRol;
        }
     
        public function setidRol($idrol)
        {
            $this->idRol = $idrol;
        }
        
        //Crear nuevo usuario
        function insert()
        {
            $respuesta = Conexion::conectar()->query("INSERT INTO Usuario (IDUsuario, PersonaID, RolID, NombreUsuario, Contrasena, Huella)
            values (".$this->getIDUsuario().",".$this->getidPersona().",".$this->getidRol().",".$this->getUsuario().",".$this->getPassword()." ,".$this->huella." )");
            return ($respuesta);
        }
        //eliminar usuario
        function delete()
        {
            $respuesta = Conexion::conectar()->query("DELETE FROM Usuario where IDUsuario =".$this->getIDUsuario()."");
            return ($respuesta);
        }
        //editar usuario
        function update()
        {
            $respuesta = Conexion::conectar()->query("UPDATE Usuario set  NombreUsuario =".$this->getUsuario().", Contrasena =".$this->getPassword()." 
            where IDUsuario =".$this->getIDUsuario()."");
            return ($respuesta);
        }

        static function findByID($id){
            $respuesta = Conexion::conectar()->query("SELECT * FROM Usuario WHERE IDUsuario = ".$id);
            while ($fila = $respuesta -> fetch_object()){
                $result[]= $fila; 
            }
            return $result[];    
        } 

        static function listarUsuario($where)
        {
            $respuesta = Conexion::conectar()->query("SELECT * FROM Usuario ".$where);
            while ($fila = $respuesta -> fetch_object()){
                $result[]= $fila; 
            }
            return $result[];  
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