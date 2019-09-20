<?php
    //LLAMO A LA CLASE CONEXION
    require_once ("../utils/conexion.php");
    require_once ("Persona.php");
    require_once ("Rol.php");

    class Usuario
    {
        private  $idUsuario;
        private  $usuario;
        private  $password;
        private  $idPersona;
        private  $idRol;
        private  $huella;
       

        //constructor
    private function __construct( $_idUsuario,$_usuario, $_password,$_idPersona,$_idRol,$_huella)
     {
      $this->setIDUsuario($_idUsuario);
      $this->setUsuario($_usuario);
      $this->setPassword($_password);
      $this->setidPersona($_idPersona);
      $this->setidRol($_idRol);
      $this->huella = $_huella;
      
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
        
        //metodos get y set idPersona
        public function getidPersona()
        {
            return $this->idPersona;
        }
     
        public function setidPersona($_idpersona)
        {
            $this->idPersona=$_idpersona;
            
        }
        //metodos get y set idRol
        public function getidRol()
        {
            return $this->idRol;
        }
     
        public function setidRol($_idrol)
        {
            $this->idRol=$_idrol;
        }
         //metodos get y set huella
         public function getHuella()
         {
            return $this->huella;
         }
      
         public function setHuella($_huella)
         {
            $this->huella = $_huella;
         }
        
        //Crear nuevo usuario
        function insert()
        {
            $conexion = Conexion::conectar()
            $resultado = $conexion->query("INSERT INTO Usuario NombreUsuario, Contrasena, PersonaID, RolID, Huella)
            values ('".$this->getUsuario()."','".$this->getPassword()."',".$this->getidPersona()->getpersonaid().",".$this->getidRol()->getIDRol().",'".$this->getHuella()."')");
            $resultid = mysqli_insert_id($conexion);
            $this->setIdSolicitante($resultid);
            $rs= mysql_query( $resultado); 

            if ($rs == false ){
                echo "error";
            }     
            else {
                echo "se inserto";
            }
        }
        //eliminar usuario
        function delete()
        {
            $resultado = Conexion::conectar()->query("DELETE FROM Usuario where IDUsuario =".$this->getIDUsuario()."");
            $rs= mysql_query( $resultado); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se elimino";
        }
        }
        //editar usuario
        function update()
        {
            $resultado = Conexion::conectar()->query("UPDATE Usuario set  NombreUsuario ='".$this->getUsuario()."', Contrasena ='".$this->getPassword()."', PersonaID=".$this->getidPersona()->getpersonaid().",EmpresaID=".$this->getidRol()->getIDRol().", Huella ='".$this->getHuella()."'
            where IDUsuario =".$this->getIDUsuario()."");
            $rs= mysql_query( $resultado); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se modifico";
        }
        }
        //rowcount Cuentas las filas.
        //fetch recorre un arreglo.
        //array_push llena un array.
        public static function findAll(){
            $resultado=Conexion::conectar()->query("SELECT * FROM Usuario" );
            
            if ($resultado->num_rows > 0) { 
                $usuario = array();
                while ($row = $resultado->fetch_assoc()) { 
                   array_push($usuario, new Usuario($row['IDUsuario'],$row['NombreUsuario'], $row['Contrasena'], Persona::findById($row['PersonaID']), Rol::findById($row['IDRol']), $row['Huella']));
                }
             return ($usuario);
             }    
             else { 
                return ("No existen registros."); 
             }
        }
        public static function findByID($id){
            $respuesta = Conexion::conectar()->query("SELECT * FROM Usuario WHERE IDUsuario = ".$id);
            if ($respuesta->num_rows > 0) { 
                $usuario = array();
                while ($row = $respuesta->fetch_assoc()) { 
                   array_push($usuario, new Usuario($row['IDUsuario'],$row['NombreUsuario'], $row['Contrasena'], Persona::findById($row['PersonaID']), Rol::findById($row['IDRol']), $row['Huella']));
                }
             return ($usuario[0]);
             }    
             else { 
                return ("No hay registros."); 
             }
              }   
        } 

        public static function findAllWhere($where)
        {
            $respuesta = Conexion::conectar()->query("SELECT * FROM Usuario WHERE ".$where);
            if ($respuesta->num_rows > 0) { 
                $usuario = array();
                while ($row = $respuesta->fetch_assoc()) { 
                   array_push($usuario, new Usuario($row['IDUsuario'],$row['NombreUsuario'], $row['Contrasena'], Persona::findById($row['PersonaID']), Rol::findById($row['IDRol']), $row['Huella']));
                }
             return ($usuario);
             }    
             else { 
                return ("No hay registros."); 
             }
              }     
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