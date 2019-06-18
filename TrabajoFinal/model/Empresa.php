<?php
//LLAMO A LA CLASE CONEXION
require_once ("../utils/conexion.php");

class Empresa
{
private $IDEmpresa;
private $razonSocial;
private $Cuit;
private $Direccion;
private $Telefono;

//Constructor vacio
function __construct()
{
}
//Get/Set atributos
public function getRazonSocial(){
    return $this->razonSocial;
}
public function setRazonsocial($rSocial){
    $this->razonSocial = $rSocial;
}
public function getCuit(){
    return $this->Cuit;
}
public function setCuit($setcuit){
    $this->Cuit=$setcuit;
}
public function getDireccion(){
    return $this->Direccion;
}
public function setDireccion($dire){
    $this->Direccion=$dire;
}

public function getTelefono(){
    return $this->Telefono;
}
public function setTelefono($tel){
    $this->Telefono=$tel;
} 

//Alta

static function insert(){
    $rta = Conexion::conectar()->query("INSERT INTO Empresa (IDEmpresa, razonSocia, Cuit, Direccion, Telefono ) 
    values (".$this->IDEmpresa.",".$this->razonSocial.",".$this->Cuit.",".$this->Direccion.",".$this->Telefono."");
    return ($rta);
}
//Baja
static function delet(){
    $rta = Conexion::conectar()->query("DELETE FROM Empresa where IDEmpresa =".$this->IDEmpresa."");
    return ($rta);
}

//Modificación
static function update(){
    $rta = Conexion::conectar()->query("UPDATE Empresa set razonSocial =".$this->razonSocial.", Cuit =".$this->Cuit.", Direccion =".$this->Direccion.", Telefono =".$this->Telefono."");
    return ($rta);

    
}






}


?>