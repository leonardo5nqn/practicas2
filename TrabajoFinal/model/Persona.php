<?php
//LLAMO A LA CLASE CONEXION
require_once("../utils/conexion.php");

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
         $conexion = Conexion::conectar();
         $resultado = $conexion->query("INSERT INTO Persona (Nombre, Apellido, Telefono, Documento, FechaNacimiento, Domicilio, Email)
         values ('".$this->getNombre()."','".$this->getApellido()."','".$this->getTelefono()."','".$this->getDoc()."','".$this->getFNacimiento()."','".$this->getDomicilio()."','".$this->getEmail()."')");
          $resultid = mysqli_insert_id($conexion);
            
          $this->setpersonaid($resultid);
        $rs= mysql_query( $resultado); 

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
         $resultado = Conexion::conectar()->query("DELETE FROM Persona where IDPersona =".$this->getpersonaid()."");
        $rs= mysql_query( $resultado); 

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
         $resultado = Conexion::conectar()->query("UPDATE Persona set  Nombre ='".$this->getNombre()."', Apellido ='".$this->getApellido()."', Telefono ='".$this->getTelefono()."', Documento ='".$this->getDoc()."',
         FechaNacimiento ='".$this->getFNacimiento()."', Domicilio ='".$this->getDomicilio()."', Email ='".$this->getEmail()."'
         where IDPersona =".$this->getpersonaid()."");
         
        $rs= mysql_query( $resultado); 

        if ($rs == false ){
            echo "error";
        }     
        else {
            echo "se modifico";
        }
      }
       //OBTENGO TODAS LAS PERSONAS
      public static function findAll(){
         $resultado=Conexion::conectar()->query("SELECT * FROM Persona" );
         
         if ($resultado->num_rows > 0) { 
             $persona = array();
             while ($row = $resultado->fetch_assoc()) { 
                array_push($persona, new Persona($row['IDPersona'],$row['Nombre'], $row['Apellido'], $row['Telefono'], $row['Documento'], $row['FechaNacimiento'], $row['Domicilio'], $row['Email']));
             }
          return ($persona);
          }    
          else { 
             return ("No existen registros."); 
          }
     }
     //OBTENGO UNA PERSONA POR ID
      public static function findByID($id)
      {
         $resultado = Conexion::conectar()->query("SELECT * FROM Persona WHERE IDPersona = ".$id);  
         if ($resultado->num_rows > 0) { 
            $persona = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($persona, new Persona($row['IDPersona'],$row['Nombre'], $row['Apellido'], $row['Telefono'], $row['Documento'], $row['FechaNacimiento'], $row['Domicilio'], $row['Email']));
            }
         return ($persona[0]);
         }    
         else { 
            return ("No hay registros."); 
         }
          }
       
      //FIND ALL + WHERE
      public static function findAllWhere($where)
      {
         $respuesta = Conexion::conectar()->query("SELECT * FROM Persona WHERE ".$where);
         if ($resultado->num_rows > 0) { 
            $persona = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($persona, new Persona($row['IDPersona'],$row['Nombre'], $row['Apellido'], $row['Telefono'], $row['Documento'], $row['FechaNacimiento'], $row['Domicilio'], $row['Email']));
            }
         return ($persona);
         }    
         else { 
            return ("No hay registros."); 
         }
          }
}
//private function __construct($_personaid, $_Nombre, $_apellido,$_Telefono,$_documento,$_FechaNacimiento,$_Domicilio,$_Email )
    //ESTO INSERTA UNA PERSONA 
    $instaciaPrueba = new Persona (NULL,"Nombre 1","Apellido 1", "123","40960987","1-1-1998","Rio negro 1","uno");

    $instaciaPrueba -> insert();

    //ESTO BORRA UNA PERSONA
    //$re = Persona::findAll()[0]->delete();

    //ESTO TRAE MUCHAS PERSONAS
    //$re = Persona::findAll();

    //ESTO TRAE UNA PERSONA POR ID
    //$re = Persona::findByID(1);
    //var_dump($re);
    //ESTO TRAE ARRAY CON WHERE STRING
    //$re = Persona::findAllWhere(" Nombre = 'Nombre 1' OR 1 = 1 ");

    //$re->setNombre("Nombre 1");

    //$re->update();

    //$re2 = Persona::findByID(1);

    //var_dump($re2);exit(); 
?>