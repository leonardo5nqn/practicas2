<?php
//--------------------------------------------------
//LLAMO AL ARCHIVO DE CONEXION A LA BASE DE DATOS
//--------------------------------------------------    
require_once ("../utils/conexion.php");

//-------------------------------------------------
//DECLARO LA CLASE PARA EL OBJETO Cisterna
//--------------------------------------------------
class Vehiculo 
{
    //CREO LAS VARIABLES
    private $idVehiculo;
    private $patente;
    private $marca;
    private $modelo;
    private $color;    
    private $tipoVehiculo;
     
    //CREO EL CONSTRUCTOR DEL OBJETO VEHICULO
    function __construct($_idVehiculo, $_patente, $_marca, $_modelo, $_color, $_tipoVehiculo){
        $this->idVehiculo=$_idVehiculo;
        $this->Patente=$_patente;
        $this->Marca=$_marca;
        $this->Modelo=$_modelo;
        $this->Color=$_color;
        $this->TipoVehiculo=$_tipoVehiculo;
    }
    //---------------------------
    //CREO LOS GETTER Y SETTERS
    //--------------------------
    //GET y SET IdVehiculo
    public function getIdVehiculo() {
        return $this->idVehiculo;
    }
    private function setIdVehiculo($_idVehiculo){
        $this ->idVehiculo=$_idVehiculo;
    }
    
    //GET y SET Patente
    public function getNumPatente(){
        return $this->Patente;
    }
    private function setNumPatente($_patente){
        $this->Patente=$_patente;
    }
    //GET Y SET Marca
    public function getMarca (){
        return $this->Marca;
    }
    private function setMarca ($_marca){
        $this->Marca=$_marca;
    }
    //GET Y SET Modelo
    public function getModelo(){
        return $this->Modelo;
    }
    private function setModelo ($_modelo){
        $this->Modelo=$_modelo;
    }
    //GET Y SET Color
    public function getColor(){
        return $this->Color;
    }
    private function setColor($_color){
        $this->Color=$_color;
    }
    //GET Y SET TipoVehiculo
    public function getTipoVehiculo (){
        return $this->TipoVehiculo;
    }
    private function setTipoVehiculo ($_tipoVehiculo){
        $this->TipoVehiculo=$_tipoVehiculo;
    }

    //--------------------------------------------------------------------------------
    //CREO LAS FUNCIONES DE ACCESO STATIC --------------------------------------------
    //--------------------------------------------------------------------------------
    
    //-------------------
    //CREO EL INSERT
    //--------------------
    public function insertVehiculo()
    {
        $resultado = Conexion::conectar()->query("INSERT INTO Vehiculo (Patente, Marca, Modelo, Color, TipoVehiculo)
        values (".$this->getNumPatente.", ".$this->getMarca.", ".$this->getModelo.",".$this->getColor.",".$this->getTipoVehiculo.")");
         
        return ($resultado);
    }

    //----------------------------
    //ELIMINO UN VEHICULO POR ID_VEHICULO
    //----------------------------
    public function deleteVehiculo () {

        $resultado=Conexion::conectar()->query("DELETE from Vehiculo where IDVehiculo = ".$this->getIdVehiculo."");
        
        return($resultado);
    }

    //-----------------------------
    //MODIFICO UN VEHICULO
    //-----------------------------
    public function updateVehiulo(){

        $resultado=Conexion::conectar()->query("UPDATE Vehiculo set Patente = ".$this->getNumPatente.", Marca = ".$this->getMarca.", Modelo = ".$this->getModelo.", Color = ".$this->getColor.", TipoVehiculo = ".$this->getTipoVehiculo."
        where IDVehiculo = ".$this->getIdVehiculo."");
        
        return($resultado);
    }

    //-------------------------------------
    //OBTENGO TODOS LOS VEHICULOS
    //Lo utilizo para listar en la grilla
    //-------------------------------------
    public function getAllVehiculos(){
        $resultado=Conexion::conectar()->query("SELECT * from Vehiculo");
        
        return ($resultado);
    }

    //--------------------------------------
    //ONTENGO UN VEHICULO POR ID (FIND by ID)
    //--------------------------------------
    public function findByIdVehiculo ($id){
        $resultado=Conexion::conectar()->query("SELECT * FROM Vehiculo WHERE IDVehiculo = ".$id);
        return ($resultado);
    }

    //-------------------------------------
    //FIND ALL + WHERE (envio una condicion por parametro)
    //----------------------------------------
    public function findAllWhereVehiculo ($where){
        $resultado= Conexion::conectar()->query("SELECT * FROM Vehiculo ".$where);
        return ($resultado);
    }



}
$instaciaPrueba = new Vehiculo ();

$instaciaPrueba -> insertVehiculo('aaa111','Reno','A3','Blanco','02');

print($instaciaPrueba);   
?>