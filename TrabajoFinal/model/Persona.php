<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

class Persona
{

    private $personaid;
    private $Nombre;
    private $Apellido;
    private $Telefono;
    private $Documento;
    private $FechaNacimiento;
    private $Domicilio;
    private $Email;

    //constructor
    public function __construct($_personaid, $_Nombre, $_apellido,$_Telefono,$_documento,$_FechaNacimiento,$_Domicilio,$_Email )
   {
      $this->personaid = $_personaid;
      $this->Nombre = $_Nombre;
      $this->Apellido = $_apellido;
      $this->Telefono = $_Telefono;
      $this->Documento = $_documento;
      $this->FechaNacimiento = $_FechaNacimiento;
      $this->Domicilio = $_Domicilio;
      $this->Email = $_Email;
   }

     //metodos get y set nombre
     public function getpersonaid()
     {
        return $this->personaid;
     }

     //metodos get y set nombre
     public function getNombre()
     {
        return $this->Nombre;
     }
  
     public function setNombre($nom)
     {
        $this->Nombre = $nom;
     }

     //metodos get y set apellido
     public function getApellido()
     {
        return $this->Apellido;
     }
  
     public function setApellido($ape)
     {
        $this->Apellido = $ape;
     }
     //metodos get y set telefono
     public function getTelefono()
     {
        return $this->Telefono;
     }
  
     public function setTelefono($tel)
     {
        $this->Telefono = $tel;
     }
     //metodos get y set documento
     public function getDoc()
     {
        return $this->Documento;
     }
  
     public function setDoc($doc)
     {
        $this->Documento = $doc;
     }
     //metodos get y set fecha de nacimiento
     public function getFNacimiento()
     {
        return $this->FechaNacimiento;
     }
  
     public function setFNacimiento($fdn)
     {
        $this->FechaNacimiento = $fdn;
     }
     //metodos get y set domicilio
     public function getDomicilio()
     {
        return $this->Domicilio;
     }
  
     public function setDomicilio($dom)
     {
        $this->Domicilio = $dom;
     }
     //metodos get y set email
     public function getEmail()
     {
        return $this->Email;
     }
  
     public function setEmail($email)
     {
        $this->Email = $email;
     }

     //ingresar persona
     function insert()
      {
         $respuesta = Conexion::conectar()->query("INSERT INTO Persona (IDPersona, Nombre, Apellido, Telefono, Documento, FechaNacimiento, Domicilio, Email)
         values (".$this->personaid.",".$this->Nombre.",".$this->Apellido.",".$this->Telefono.",".$this->Documento.",".$this->FechaNacimiento.",".$this->Domicilio.",".$this->Email.")");
         return ($respuesta);    
      }  
     //eliminar persona
     function delete()
      {
         $respuesta = Conexion::conectar()->query("DELETE FROM Persona where IDPersona =".$this->personaid."");
         return ($respuesta);
      }

     //editar persona
      function update()
      {
         $respuesta = Conexion::conectar()->query("UPDATE Persona set  Nombre =".$this->Nombre.", Apellido =".$this->Apellido.", Telefono =".$this->Telefono.", Documento =".$this->Documento.",
         FechaNacimiento =".$this->FechaNacimiento.", Domicilio =".$this->Domicilio.", Email =".$this->Email."
         where IDPersona =".$this->personaid."");
         return ($respuesta);
      }
      static function findByID($id)
      {
         return (Conexion::conectar()->query("SELECT * FROM Persona WHERE IDPersona = ".$id));    
      } 

      static function listarPersona($where)
      {
         return (Conexion::conectar()->query("SELECT * FROM Persona ".$where));
      } 
       
      


}
?>