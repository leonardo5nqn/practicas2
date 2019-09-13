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
        private function __construct($_idCisterna, $_totalLitros, $_nombreCisterna){
            $this->setIdCisterna = $_idCisterna;
            $this->setTotalLitros = $_totalLitros;
            $this->setNombreCisterna = $_nombreCisterna;
        }

        //---------------------------
        //CREO LOS GETTER Y SETTERS
        //--------------------------

        //GET Y SET IdCisterna
        public function getIdCisterna(){
            return $this->IdCisterna;
        }
        private function setIdCisterna($_idCisterna){
            $this->IdCisterna=$_idCisterna;
        }

        //GET Y SET TotalLitros
        public function getTotalLitros (){
            return $this->TotalLitros;
        }
        private function setTotalLitros ($_totalLitros){
            $this->TotalLitros=$_totalLitros;
        }

        //GET Y SET NombreCisterna
        public function getNombreCisterna(){
            return $this->NombreCisterna;
        }
        private function setNombreCisterna($_nombreCisterna){
            $this->NombreCisterna=$_nombreCisterna;
        }

        //--------------------------------------------------------------------------------
        //CREO LAS FUNCIONES --------------------------------------------------
        //--------------------------------------------------------------------------------

        //TAreas
        // retornar objetos en php
        //mejoras las clase, cister, solicitante, vehiculo.

        //-------------------------
        //FUNCION INSERT - No agregue el ID Cisterna porque se autoincrementa en la base datos.
        //------------------------
        function insertCisterna(){
            $resultado = Conexion::conectar()->query("INSERT INTO Cisterna(IDCisterna,TotalLitros,NombreCisterna) 
            VALUES ("$this->getIdCisterna().",".$this->getTotalLitros().",".$this->getNombreCisterna().")");
            return ($resultado);
        }
        //----------------------------
        //ELIMINO UNA CISTERNA POR ID_VEHICULO
        //----------------------------
        function deleteCisterna(){
            $resultado= Conexion::conectar()->query("DELETE FROM Cisterna WHERE IDCisterna=".$this->getIdCisterna()."");
            return ($resultado);
        }   

        //------------------------------------
        //modifico una cisterna
        //------------------------------------
        function updateCisterna(){
            $resultado=Conexion::conectar()->query("UPDATE Cisterna SET IDCisterna=".$this->getIdCisterna().",TotalLitros=".$this->getTotalLitros().",NombreCisterna".$this->getNombreCisterna."");
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
            //retorno el objeto de ID
        }

        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------
        function findAllWhereCisterna($where){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna ".$where);
            return ($resultado);
            //retorno el objeto de busqueda
        }

    }
?>