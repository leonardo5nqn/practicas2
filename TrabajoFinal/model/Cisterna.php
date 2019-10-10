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

        public function __construct($idCisterna,$_totalLitros, $_nombreCisterna){
            $this->setIdCisterna($idCisterna);
            $this->setTotalLitros($_totalLitros);
            $this->setNombreCisterna($_nombreCisterna);
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
        public function setNombreCisterna($_nombreCisterna){
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
        function insert(){
            $conexion = Conexion::conectar();
            $resultado = $conexion->query("INSERT INTO Cisterna(TotalLitros,NombreCisterna) 
            VALUES ('".$this->getTotalLitros()."','".$this->getNombreCisterna()."')");

            $resultid = mysqli_insert_id($conexion);
            
            $this->setIdCisterna($resultid);

            return true;
        }
        //----------------------------
        //ELIMINO UNA CISTERNA POR ID_VEHICULO
        //----------------------------
        function delete(){
            $resultado= Conexion::conectar()->query("DELETE FROM Cisterna WHERE IDCisterna=".$this->getIdCisterna()."");
            return true;
        }   

        //------------------------------------
        //modifico una cisterna
        //------------------------------------
        function update(){
            $resultado=Conexion::conectar()->query("UPDATE Cisterna SET IDCisterna='".$this->getIdCisterna()."',TotalLitros='".$this->getTotalLitros()."',NombreCisterna = '".$this->getNombreCisterna()."' WHERE IDCisterna = ".$this->getIdCisterna());
            return true;
        }

        //----------------------------------
        //OBTENGO TODAS LAS CISTERNAS
        //------------------------------------
        public static function findAll(){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna" );
            
            if ($resultado->num_rows > 0) { 
                $cisternas = array();
                while ($row = $resultado->fetch_assoc()) { 
                   array_push($cisternas, new Cisterna($row['IDCisterna'], $row['TotalLitros'], $row['NombreCisterna']));
                }
             return ($cisternas);
             }    
             else { 
                return ("No existen registros."); 
             }
        }

        //--------------------------------------
        //ONTENGO UN VEHICULO POR ID (FIND by ID)
        //--------------------------------------
        public static function findByID($id){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna WHERE IDCisterna = ".$id);
            
            if ($resultado->num_rows > 0) {
                $cisternas = array();
                while ($row = $resultado->fetch_assoc()) { 
                   array_push($cisternas, new Cisterna($row['IDCisterna'], $row['TotalLitros'], $row['NombreCisterna']));
                }
                return ($cisternas[0]);
             }    
             else { 
                return ("No existen registros."); 
             }
        }

        //-------------------------------------
        //FIND ALL + WHERE
        //----------------------------------------
        public static function findAllWhere($where){
            $resultado=Conexion::conectar()->query("SELECT * FROM Cisterna WHERE ".$where);
            if ($resultado->num_rows > 0) { 
                $cisternas = array();
                while ($row = $resultado->fetch_assoc()) { 
                   array_push($cisternas, new Cisterna($row['IDCisterna'], $row['TotalLitros'], $row['NombreCisterna']));
                }
             return ($cisternas);
             }    
             else { 
                return ("No existen registros."); 
             }
        }

    }

    //ESTO INSERTA UNA CISTERNA 
    //$instaciaPrueba = new Cisterna (NULL,"15","Nombre 56");

   // $instaciaPrueba -> insert();

    //ESTO BOORA UNA CISTERNAS
    //$re = Cisterna::findAll()[0]->delete();

    //ESTO TRAE MUCHAS CISTERNAS
    //$re = Cisterna::findAll();

    //ESTO TRAE UNA CISTERNA POR ID
    $re = Cisterna::findByID(2);
    var_dump($re);
    //ESTO TRAE ARRAY CON WHERE STRING
    //$re = Cisterna::findAllWhere(" NombreCisterna = 'Nombre 1' OR 1 = 1 ");

    $re->setNombreCisterna("Nombre 60");

    $re->update();

    $re2 = Cisterna::findByID(2);

    var_dump($re2);exit();
    
?>