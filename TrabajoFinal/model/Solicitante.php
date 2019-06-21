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
        function __construct($Id_Solicitante,$Id_Persona,$Id_Empresa){
            $this->IdSolicitante=$Id_Solicitante;
            $this->IdPersona=$Id_Persona;
            $this->IdEmpresa=$Id_Empresa;
        }

        //---------------------------
        //CREO LOS GETTER Y SETTERS
        //--------------------------

        //GET Y SET IdCisterna
        public function getIdSolicitante(){
            return $this->IdSolicitante;
        }
        public function setIdSolicitante($Id_Solicitante){
            $this->IdSolicitante=$Id_Solicitante;
        }

        //GET Y SET IdPersona}
        public function getIdPersona(){
            return $this->getIdPersona;
        }
        public function setIdPersona($Id_Persona){
            $this->IdPersona=$Id_Persona;
        }

        //GET Y SET IdEmpresa
        public function getIdEmpresa(){
            return $this->getIdEmpresa;
        }
        public function setIdEmpresa($Id_Empresa){
            $this->IdEmpresa=$Id_Empresa;
        }

        //--------------------------------------------------------------------------------
        //CREO LAS FUNCIONES con ACCESO STATIC --------------------------------------------
        //--------------------------------------------------------------------------------
        
        //-------------------------
        //FUNCION Agrego Un solicitante 
        //------------------------
        public function SolicitanteInsert (){
            
        }

        //----------------------------
        //ELIMINO UN Solcitante POR ID
        //----------------------------
        public function SolicitanteDelete(){

        }

        //------------------------------------
        //modifico un Solicitante
        //------------------------------------
        public function SolicitanteUpdate(){

        }

        //----------------------------------
        //OBTENGO/Listo TODAS Los Solicitantes
        //------------------------------------

        //--------------------------------------
        //ONTENGO UN VEHICULO POR ID (FIND by ID)
        //--------------------------------------


        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------

    }
?>