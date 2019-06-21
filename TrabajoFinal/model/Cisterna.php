<?php
    //--------------------------------------------------
    //LLAMO AL ARCHIVO DE CONEXION A LA BASE DE DATOS
    //--------------------------------------------------
    require_once("../utils/conexion.php");

    //-------------------------------------------------
    //DECLARO LA CLASE PARA EL OBJETO Cisterna
    //--------------------------------------------------
    class Cisterna {

        //DECLARO LAS VARIABLES CON VISIBILIDAD PRIVADA, SOLO PARA USO DE LA CLASE
        private $IdCisterna;
        private $TotalLitros;
        private $NombreCisterna;

        //21/06/2019 se modificaron los nombres en la Tabla Cisterna, TotalLitros y NombreCisterna. Los mismos estaban separados por espacios.

        //---------------------------
        //DEFINO EL CONSTRUCTOR
        //----------------------------
        function __construct(){

        }

        //---------------------------
        //CREO LOS GETTER Y SETTERS
        //--------------------------

        //GET Y SET IdCisterna
        public function getIdCisterna(){
            return $this->IdCisterna;
        }
        public function setIdCisterna($IdCister){
            $this->IdCisterna=$IdCister;
        }

        //GET Y SET TotalLitros
        public function getTotalLitros (){
            return $this->TotalLitros;
        }
        public function setTotalLitros ($TotalLit){
            $this->TotalLitros=$TotalLit;
        }

        //GET Y SET NombreCisterna
        public function getNombreCisterna(){
            return $this->NombreCisterna;
        }
        public function setNombreCisterna($nomCister){
            $this->NombreCisterna=$nomCister;
        }

        //--------------------------------------------------------------------------------
        //CREO LAS FUNCIONES DE ACCESO STATIC --------------------------------------------
        //--------------------------------------------------------------------------------

        //-------------------------
        //FUNCION INSERT - No agregue el ID Cisterna porque se autoincrementa
        //------------------------
        static function insertCisterna(){
            $resultado=Conexion::conectar()->query("INSERT INTO Cisterna(IDCisterna,TotalLitros,NombreCisterna) VALUES(".$this->TotalLitros.",".$this->NombreCisterna.")");
            return ($resultado);
        }
        //----------------------------
        //ELIMINO UNA CISTERNA POR ID_VEHICULO
        //----------------------------
        static function deleteCisterna(){
            $resultado= Conexion::conectar()->query("DELETE FROM Cisterna WHERE IDCisterna=".$this->IdCisterna."");
            return ($resultado);
        }   

        //------------------------------------
        //modifico una cisterna
        //------------------------------------
        static function updateCisterna(){
            $resultado=Conexion::conectar()->query("UPDATE Cisterna SET IDCisterna=".$this->IdCisterna.",TotalLitros=".$this->TotalLitros.",NombreCisterna".$this->NombreCisterna."");
            return($resultado);
        }

        //----------------------------------
        //OBTENGO TODAS LAS CISTERNAS
        //------------------------------------
        static function findAllCistera(){
            $resultado=Conexion::Conectar()->query("SELECT * FROM Cisterna");
            return ($resultado);
        }

        //--------------------------------------
        //ONTENGO UN VEHICULO POR ID (FIND by ID)
        //--------------------------------------


        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------


    }
?>