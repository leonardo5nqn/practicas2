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
    public function __construct($_Nombre, $_apellido, $_Telefono, $_documento, $_FechaNacimiento, $_Domicilio, $_Email )
   {
      $this->setNombre($_Nombre);
      $this->setApellido($_apellido);
      $this->setTelefono($_Telefono);
      $this->setDoc($_documento);
      $this->setFNacimiento($_FechaNacimiento);
      $this->setDomicilio($_Domicilio);
      $this->setEmail($_Email);
   }
    private function __construct($_personaid, $_Nombre, $_apellido,$_Telefono,$_documento,$_FechaNacimiento,$_Domicilio,$_Email )
   {
      $this->setpersonaid($_personaid);
      $this->setNombre($_Nombre);
      $this->setApellido($_apellido);
      $this->setTelefono($_Telefono);
      $this->setDoc($_documento);
      $this->setFNacimiento($_FechaNacimiento);
      $this->setDomicilio($_Domicilio);
      $this->setEmail($_Email);
   }

     //metodos get y set nombre
     public function getpersonaid()
     {
        return $this->personaid;
     }
     private function setpersonaid($PersonaId)
     {
      $this->personaid = $PersonaId;
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
         values (".$this->getpersonaid().",".$this->getNombre().",".$this->getApellido().",".$this->getTelefono().",".$this->getDoc().",".$this->getFNacimiento().",".$this->getDomicilio().",".$this->getEmail().")");
         
        $rs= mysql_query( $respuesta); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se inserto";
        }  
      }  
     //eliminar persona
     function delete()
      {
         $respuesta = Conexion::conectar()->query("DELETE FROM Persona where IDPersona =".$this->getpersonaid()."");
        $rs= mysql_query( $respuesta); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se elimino";
        }
      }

     //editar persona
      function update()
      {
         $respuesta = Conexion::conectar()->query("UPDATE Persona set  Nombre =".$this->getNombre().", Apellido =".$this->getApellido().", Telefono =".$this->getTelefono().", Documento =".$this->getDoc().",
         FechaNacimiento =".$this->getFNacimiento().", Domicilio =".$this->getDomicilio().", Email =".$this->getEmail()."
         where IDPersona =".$this->getpersonaid()."");
         
        $rs= mysql_query( $respuesta); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se modifico";
        }
      }
      static function findByID($id)
      {
         $respuesta = Conexion::conectar()->query("SELECT * FROM Persona WHERE IDPersona = ".$id);  
         if ($respuesta->rowCount() > 0) { 
            $persona = array();
            while ($row = $respuesta->fetch()) { 
               array_push($persona, new Persona($row['IDPersona'],$row['Nombre'], $row['Apellido'], $row['Telefono'], $row['Documento'], $row['FechaNacimiento'], $row['Domicilio'], $row['Email']));
            }
         return ($persona);
         }    
         else { 
            return ("No hay registros."); 
         }
          }
      } 

      static function listarPersona($where)
      {
         $respuesta = Conexion::conectar()->query("SELECT * FROM Persona ".$where);
         if ($respuesta->rowCount() > 0) { 
            $persona = array();
            while ($row = $respuesta->fetch()) { 
               array_push($persona, new Persona($row['IDPersona'],$row['Nombre'], $row['Apellido'], $row['Telefono'], $row['Documento'], $row['FechaNacimiento'], $row['Domicilio'], $row['Email']));
            }
         return ($persona);
         }    
         else { 
            return ("No hay registros."); 
         }
          }
      } 
}
?>