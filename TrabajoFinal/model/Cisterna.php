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
        function __construct($_idCisterna, $_totalLitros, $_nombreCisterna){
            $this->IdCisterna = $_idCisterna;
            $this->TotalLitros = $_totalLitros;
            $this->NombreCisterna = $_nombreCisterna;
        }

        //---------------------------
        //CREO LOS GETTER Y SETTERS
        //--------------------------

        //GET Y SET IdCisterna
        public function getIdCisterna(){
            return $this->IdCisterna;
        }
        public function setIdCisterna($_idCisterna){
            $this->IdCisterna=$_idCisterna;
        }

        //GET Y SET TotalLitros
        public function getTotalLitros (){
            return $this->TotalLitros;
        }
        public function setTotalLitros ($_totalLitros){
            $this->TotalLitros=$_totalLitros;
        }

        //GET Y SET NombreCisterna
        public function getNombreCisterna(){
            return $this->NombreCisterna;
        }
        public function setNombreCisterna($_nombreCisterna){
            $this->NombreCisterna=$_nombreCisterna;
        }

        //--------------------------------------------------------------------------------
        //CREO LAS FUNCIONES --------------------------------------------------
        //--------------------------------------------------------------------------------

        //-------------------------
        //FUNCION INSERT - No agregue el ID Cisterna porque se autoincrementa
        //------------------------
        function insertCisterna(){
            $resultado=Conexion::conectar()->query("INSERT INTO Cisterna(IDCisterna,TotalLitros,NombreCisterna) VALUES("$this->IdCisterna.",".$this->TotalLitros.",".$this->NombreCisterna.")");
            return ($resultado);
        }
        //----------------------------
        //ELIMINO UNA CISTERNA POR ID_VEHICULO
        //----------------------------
        function deleteCisterna(){
            $resultado= Conexion::conectar()->query("DELETE FROM Cisterna WHERE IDCisterna=".$this->IdCisterna."");
            return ($resultado);
        }   

        //------------------------------------
        //modifico una cisterna
        //------------------------------------
        function updateCisterna(){
            $resultado=Conexion::conectar()->query("UPDATE Cisterna SET IDCisterna=".$this->IdCisterna.",TotalLitros=".$this->TotalLitros.",NombreCisterna".$this->NombreCisterna."");
            return($resultado);
        }

        //----------------------------------
        //OBTENGO TODAS LAS CISTERNAS
        //------------------------------------
        function findAllCistera(){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna" );
            return ($resultado);
        }

        //--------------------------------------
        //ONTENGO UN VEHICULO POR ID (FIND by ID)
        //--------------------------------------
        function findByIDCisterna($id){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna WHERE IDCisterna = ".$id);
            return($resultado);
        }

        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------
        function findAllWhereCisterna($where){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna ".$where);
            return ($resultado);
        }

    }
?>