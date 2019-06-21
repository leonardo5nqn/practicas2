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
        function __construct(){

        }

        //---------------------------
        //CREO LOS GETTER Y SETTERS
        //--------------------------

        //GET Y SET IdCisterna
        public function getIdSolicitanye(){
            return $this->IdSolicitante;
        }
        public function setIdSolicitante($IdSoli){
            $this->IdSolicitante=$IdSoli;
        }

        //--------------------------------------------------------------------------------
        //CREO LAS FUNCIONES con ACCESO STATIC --------------------------------------------
        //--------------------------------------------------------------------------------

        //-------------------------
        //FUNCION Agrego Un solicitante 
        //------------------------

        //----------------------------
        //ELIMINO UN Solcitante POR ID
        //----------------------------

        //------------------------------------
        //modifico un Solicitante
        //------------------------------------

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