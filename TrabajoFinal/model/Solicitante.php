<?php
      require("../utils/conexion.php");
    require("./Empresa.php");
    require("./Persona.php");

    class Solicitante {

        private $idSolicitante;
        private $persona;
        private $empresa;
        
        public function __construct($_idSolcitante,  $_persona, $_empresa){
            $this->setIdSolicitante($_idSolcitante);
            $this->setIdPersona($_persona);
            $this->setEmpresa($_empresa);
        }
        
        public function getIdSolicitante(){
            return $this->idSolicitante;
        }
        private function setIdSolicitante($_idSolcitante){
            $this->idSolicitante=$_idSolcitante;
        }

        public function getPersona(){
            return $this->persona;
        }
        private function setPersona($_persona){
            $this->persona=$_persona;
        }
        
        public function getEmpresa(){
            return $this->empresa;
        }
        private function setEmpresa($_empresa){
            $this->empresa=$_empresa;
        }

        public function insert (){
         $conexion = Conexion::conectar();
         $resultado = $conexion->query("INSERT INTO Solicitante(IDSolicitante, PersonaID, EmpresaID) VALUES ('".$this->getIdSolicitante()."','"$this->getPersona()->getpersonaid()."','".$this->getEmpresa()->getIDEmpresa()."')");
         $resultid = mysqli_insert_id($conexion);
         $this->setIdSolicitante($resultid);
         if($conexion->error){
            return ("Error: ".$conexion->error);
             } else {
             return ("Registro insertado correctamente");
           }
        }

        public function delete(){
         $conexion = Conexion::conectar();
         $resultado = $conexion->query("DELETE FROM Solicitante WHERE IDSolicitante = ".$this->getIdSolicitante());
         if($conexion->error){
            return ("Error: ".$conexion->error);
             } else {
             return ("Registro eliminado correctamente");
           }
        }

        public function update(){
         $conexion = Conexion::conectar();
         $resultado = $conexion->query("UPDATE Solcitante SET IDSolicitante =".$this->getIdSolicitante().",PersonaID=".$this->getPersona()->getpersonaid().",EmpresaID=".$this->getEmpresa()->getIDEmpresa());
            if($conexion->error){
               return ("Error: ".$conexion->error);
                } else {
                return ("Registro actualizado correctamente");
              }
        }

        public function findAll(){
         $resultado=Conexion::conectar()->query("SELECT * FROM Solicitante");
            if ($resultado->num_rows > 0) { 
               $solicitante = array();
               while ($row = $resultado->fetch_assoc()) { 
                  array_push($cisternas, new Solicitante($row['IDSolicitante'], Persona::findById($row['PersonaID']), Empresa::findById($row['EmpresaID'])));
               }
            return ($solicitante);
            }    
            else { 
               return ("No existen registros."); 
            }
        }

        public function findById($id){   
            $resultado=Conexion::conectar()->query("SELECT * FROM Solicitante WHERE IDSolicitante = ".$id);
            if ($resultado->num_rows > 0) { 
               $solicitante = array();
               while ($row = $resultado->fetch_assoc()) { 
                  array_push($cisternas, new Solicitante($row['IDSolicitante'], Persona::findById($row['PersonaID']), Empresa::findById($row['EmpresaID'])));
               }
            return ($solicitante[0]);
            }    
            else { 
               return ("No existen registros."); 
            }     
        }

        public function findAllWhere($where){
         $resultado=Conexion::conectar()->query("SELECT * FROM Solicitante WHERE ".$where);
         if ($resultado->num_rows > 0) { 
            $solicitante = array();
            while ($row = $resultado->fetch_assoc()) { 
               array_push($cisternas, new Solicitante($row['IDSolicitante'], Persona::findById($row['PersonaID']), Empresa::findById($row['EmpresaID'])));
            }
         return ($solicitante);
         }    
         else {  return ("No existen registros."); 
        }
       }
    }
?>
