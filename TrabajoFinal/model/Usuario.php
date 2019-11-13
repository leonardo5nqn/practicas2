<?php
//LLAMO A LA CLASE CONEXION
require_once("../utils/conexion.php");
require_once("Persona.php");
require_once("Rol.php");

class Usuario {
    private $idUsuario;
    private $usuario;
    private $password;
    private $persona;
    private $IDRol;
    private $huella;
    
    private function __construct($_idUsuario, $_usuario, $_password, $_persona, $_IDRol, $_huella) {
        $this->setIDUsuario($_idUsuario);
        $this->setUsuario($_usuario);
        $this->setPassword($_password);
        $this->setPersona($_persona);
        $this->setIDRol($_IDRol);
        $this->setHuella($_huella);
    }

    public function getIDUsuario() {
        return $this->idUsuario;
    }

    public function setIDUsuario($id) {
        $this->idUsuario = $id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    private function setUsuario($us) {
        $this->usuario = $us;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($pass) {
        $this->password = $pass;
    }
    
    public function getPersona() {
        return $this->persona;
    }
    
    public function setPersona($_persona) {
        $this->persona = $_persona;
    }

    public function getIDRol() {
        return $this->IDRol;
    }
    
    public function setIDRol($_IDRol) {
        $this->IDRol = $_IDRol;
    }

    public function getHuella() {
        return $this->huella;
    }
    
    public function setHuella($_huella) {
        $this->huella = $_huella;
    }
    
    function insert() {
        /*  $conexion = Conexion::conectar()
        $resultado = $conexion->query("INSERT INTO Usuario NombreUsuario, Contrasena, PersonaID, IDRol, Huella)
        values ('".$this->getUsuario()."','".$this->getPassword()."',".$this->getPersona()->getPersonaid().",".$this->getIDRol()->getIDRol().",'".$this->getHuella()."')");
        $resultid = mysqli_insert_id($conexion);
        $this->setIdSolicitante($resultid);
        $rs= mysql_query( $resultado); 
        
        if ($rs == false ){
        echo "error";
        }    
        else {
        echo "se inserto";
        } */
    }
    //eliminar usuario
    function delete() {
        /*    $resultado = Conexion::conectar()->query("DELETE FROM Usuario where IDUsuario =".$this->getIDUsuario()."");
        $rs= mysql_query( $resultado); 
        
        if ($rs == false ){
        echo "error";
        }    
        else {
        echo "se elimino";
        } */
    }
    //editar usuario
    function update() {
        /*    $resultado = Conexion::conectar()->query("UPDATE Usuario set  NombreUsuario ='".$this->getUsuario()."', Contrasena ='".$this->getPassword()."', PersonaID=".$this->getPersona()->getPersonaid().",EmpresaID=".$this->getIDRol()->getIDRol().", Huella ='".$this->getHuella()."'
        where IDUsuario =".$this->getIDUsuario()."");
        $rs= mysql_query( $resultado); 
        
        if ($rs == false ){
        echo "error";
        }    
        else {
        echo "se modifico";
        } */
    }

    public static function findAll() {
        $resultado = Conexion::conectar()->query("SELECT * FROM Usuario");
        if ($resultado->num_rows > 0) {
            $usuario = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($usuario, new Usuario($row['IDUsuario'], $row['NombreUsuario'], $row['Contrasena'], Persona::findById($row['PersonaID']), Rol::findById($row['IDRol']), $row['Huella']));
            }
            return ($usuario);
        } else {
            return ("No existen registros.");
        }
    }
    public static function findByID($id) {
        $respuesta = Conexion::conectar()->query("SELECT * FROM Usuario WHERE IDUsuario = ".$id);
        if ($respuesta->num_rows > 0) {
            $usuario = array();
            while ($row = $respuesta->fetch_assoc()) {
                array_push($usuario, new Usuario($row['IDUsuario'], $row['NombreUsuario'], $row['Contrasena'], Persona::findById($row['PersonaID']), Rol::findById($row['IDRol']), $row['Huella']));
            }
            return ($usuario[0]);
        } else {
            return ("No hay registros.");
        }
    }
    
    public static function findAllWhere($where) {
        $respuesta = Conexion::conectar()->query("SELECT * FROM Usuario WHERE ".$where);
        if ($respuesta->num_rows > 0) {
            $usuario = array();
            while ($row = $respuesta->fetch_assoc()) {
                array_push($usuario, new Usuario($row['IDUsuario'], $row['NombreUsuario'], $row['Contrasena'], Persona::findById($row['PersonaID']), Rol::findById($row['IDRol']), $row['Huella']));
            }
               return ($usuario);
        } else {
            return null;
        }
    }
}
?>