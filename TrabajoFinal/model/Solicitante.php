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
        function __construct($_idSolcitante,$_idPersona,$_idEmpresa){
            $this->IdSolicitante=$_idSolcitante;
            $this->IdPersona=$_idPersona;
            $this->IdEmpresa=$_idEmpresa;
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
        function insertSolicicitante (){
            $resultado = Conexion::conectar()->query("INSERT INTO Solicitante(IDSolicitante,PersonaID,EmpresaID) VALUES ("$this->IdSolicitante.",".$this->IdPersona.",".$this->IdEmpresa.")");
            return($resultado);
        }

        //----------------------------
        //ELIMINO UN Solcitante POR ID
        //----------------------------
        function deleteSolicitante(){
            $resultado=Conexion::conectar()->query("DELETE FROM Solicitante WHERE IDSolicitante=".$this->IDSolicitante."");
            return($resultado); 
        }

        //------------------------------------
        //modifico un Solicitante
        //------------------------------------
        function updateSolicitante(){
            $resultado = Conexion::conectar()->query("UPDATE Solcitante SET IDSolicitante =".$this->IdSolcitante.",PersonaID=".$this->IDPersona.",EmpresaID=".$this->IDEmpresa."");
            return($resultado);
        }

        //----------------------------------
        //OBTENGO/Listo TODAS Los Solicitantes
        //------------------------------------
        function findAllSolicitante(){
            $resultado = Conexion::conectar()->query("SELECT * FROM Solicitante");
            return ($resultado);
        }

        //--------------------------------------
        //ONTENGO UN VEHICULO POR ID (FIND by ID)
        //--------------------------------------
        function findByIdSolicitante($id){
            $resultado = Conexion::conectar()->query("SELECT * FROM Solicitante WHERE IDSolicitante = ".$id);
            return ($resultado);            
        }

        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------
        function findAllWhereSolicitante ($where){
            $resultado = Conexion::conectar()->query("SELECT * FROM Solicitante ".$where);
            return ($resultado);
        }
    }
?>