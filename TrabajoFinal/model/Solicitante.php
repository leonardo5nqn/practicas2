<?php
    //--------------------------------------------------
    //LLAMO AL ARCHIVO DE CONEXION A LA BASE DE DATOS
    //--------------------------------------------------
    require_once("../utils/conexion.php");

    //-------------------------------------------------
    //DECLARO LA CLASE PARA EL OBJETO Cisterna
    //--------------------------------------------------
    class Solicitante {
        //DECLARO LAS VARIABLES CON VISIBILIDAD PRIVADA, SOLO PARA USO DE LA CLASE
        private $IdSolicitante;
        private $IdPersona;
        private $IdEmpresa;

        //---------------------------
        //DEFINO EL CONSTRUCTOR
        //----------------------------
        public function __construct($_idSolcitante,$_idPersona,$_idEmpresa){
            $this->setIdSolicitante=$_idSolcitante;
            $this->setIdPersona=$_idPersona;
            $this->setIdEmpresa=$_idEmpresa;
        }

        //---------------------------
        //CREO LOS GETTER Y SETTERS
        //--------------------------

        //GET Y SET IdCisterna
        public function getIdSolicitante(){
            return $this->IdSolicitante;
        }
        private function setIdSolicitante($_idSolcitante){
            $this->IdSolicitante=$_idSolcitante;
        }

        //GET Y SET IdPersona}
        public function getIdPersona(){
            return $this->getIdPersona;
        }
        private function setIdPersona($_idPersona){
            $this->IdPersona=$_idPersona;
        }

        //GET Y SET IdEmpresa
        public function getIdEmpresa(){
            return $this->getIdEmpresa;
        }
        private function setIdEmpresa($_idEmpresa){
            $this->IdEmpresa=$_idEmpresa;
        }

        //--------------------------------------------------------------------------------
        //CREO LAS FUNCIONES con ACCESO STATIC --------------------------------------------
        //--------------------------------------------------------------------------------
        
        //-------------------------
        //FUNCION Agrego Un solicitante 
        //------------------------
        public function insertSolicicitante (){
            $resultado = Conexion::conectar()->query("INSERT INTO Solicitante(IDSolicitante,PersonaID,EmpresaID) VALUES ("$this->getIdSolicitante().",".$this->getIdPersona().",".$this->getIdEmpresa().")");
            return($resultado);
        }

        //----------------------------
        //ELIMINO UN Solcitante POR ID
        //----------------------------
        public function deleteSolicitante(){
            $resultado=Conexion::conectar()->query("DELETE FROM Solicitante WHERE IDSolicitante=".$this->getIdSolicitante()."");
            return($resultado); 
        }

        //------------------------------------
        //modifico un Solicitante
        //------------------------------------
        public function updateSolicitante(){
            $resultado = Conexion::conectar()->query("UPDATE Solcitante SET IDSolicitante =".$this->getIdSolicitante().",PersonaID=".$this->getIdPersona().",EmpresaID=".$this->getIdEmpresa()."");
            return($resultado);
        }

        //----------------------------------
        //OBTENGO/Listo TODAS Los Solicitantes
        //------------------------------------
        public function findAllSolicitante(){
            $resultado = Conexion::conectar()->query("SELECT * FROM Solicitante");
            return ($resultado);
        }

        //--------------------------------------
        //ONTENGO UN VEHICULO POR ID (FIND by ID)
        //--------------------------------------
        public function findByIdSolicitante($id){
            $resultado = Conexion::conectar()->query("SELECT * FROM Solicitante WHERE IDSolicitante = ".$id);
            return ($resultado);            
        }

        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------
        public function findAllWhereSolicitante ($where){
            $resultado = Conexion::conectar()->query("SELECT * FROM Solicitante ".$where);
            return ($resultado);
        }
    }
?>