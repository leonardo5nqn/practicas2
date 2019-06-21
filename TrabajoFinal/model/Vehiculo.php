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
    private $Patente;
    private $Marca;
    private $Modelo;
    private $Color;    
    private $TipoVehiculo;

    //CREO EL CONSTRUCTOR DEL OBJETO VEHICULO
    function __construct(){

    }
    //---------------------------
    //CREO LOS GETTER Y SETTERS
    //--------------------------
    //GET y SET IdVehiculo
    public function getIdVehiculo()(
        return $this->idVehiculo;
    )
    public function setIdVehiculo($idVehi){
        $this ->idVehiculo =$idVehi;
    }
    //GET y SET Patente
    public function getNumPatente(){
        return $this->Patente;
    }
    public function setNumPatente($paten){
        $this->Patente=$patente;
    }
    //GET Y SET Marca
    public function getMarca (){
        return $this->Marca;
    }
    public function setMarca ($Mar){
        $this->Marca=$Mar;
    }
    //GET Y SET Modelo
    public function getModelo(){
        return $this->Modelo;
    }
    public function setModelo ($Model){
        $this->Modelo=$Model;
    }
    //GET Y SET Color
    public function getColor(){
        return $this->Color;
    }
    public function setColor($Col){
        $this->Color=$Col;
    }
    //GET Y SET TipoVehiculo
    public function getTipoVehiculo (){
        return $this->TipoVehiculo;
    }
    public function setTipoVehiculo ($TipoVehi){
        $this->TipoVehiculo=$TipoVehi;
    }

    //--------------------------------------------------------------------------------
    //CREO LAS FUNCIONES DE ACCESO STATIC --------------------------------------------
    //--------------------------------------------------------------------------------
    
    //-------------------
    //CREO EL INSERT
    //--------------------
    static function insertVehiculo()
    {
        $resultado = Conexion::conectar()->query("INSERT INTO Vehiculo (Patente, Marca, Modelo, Color, TipoVehiculo)
        values (".$this->Patente", ".$this->Marca", ".$this->Modelo", ".$this->Color", ".$this->TipoVehiculo")");
         
        return ($resultado);
    }

    //----------------------------
    //ELIMINO UN VEHICULO POR ID_VEHICULO
    //----------------------------
    static function deleteVehiculo () {

        $resultado=Conexion::conectar()->query("DELETE from Vehiculo where IDVehiculo = ".$this->idVehiculo"");
        
        return=$resultado;
    }

    //-----------------------------
    //MODIFICO UN VEHICULO
    //-----------------------------
    static function updateVehiulo(){

        $resultado=Conexion::conectar()->query("UPDATE Vehiculo set IDVehiculo = ".$this->idVehiculo", Patente = ".$this->Patente", Marca = ".$this->Marca", Modelo = ".$this->Modelo", Color = ".$this->Color", TipoVehiculo = ".$this->TipoVehiculo"
        where IDVehiculo = ".$this->idVehiculo"");
        
        return($resultado);
    }

    //-------------------------------------
    //OBTENGO TODOS LOS VEHICULOS
    //Lo utilizo para listar en la grilla
    //-------------------------------------
    static function getAllVehiculos(){
        $resultado=Conexion::conectar()->query("SELECT * from Vehiculo");
        
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