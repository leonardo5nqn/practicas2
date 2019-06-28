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
function __construct($IDEmpresa, $razonSocial, $Cuit, $Direccion, $Telefono)
{
    $this->setIDEmpresa($IDEmpresa);
    $this->setRazonsocial($razonSocial);
    $this->setCuit($Cuit);
    $this->setDireccion($Direccion);
    $this->setTelefono($Telefono);

}
//Get/Set atributos
public function getIDEmpresa(){
    return $this->IDEmpresa;
}
private function setIDEmpresa($Id){
    $this->IDEmpresa = $Id;
}

public function getRazonSocial(){
    return $this->razonSocial;
}
private function setRazonsocial($rSocial){
    $this->razonSocial = $rSocial;
}
public function getCuit(){
    return $this->Cuit;
}
private function setCuit($setcuit){
    $this->Cuit=$setcuit;
}
public function getDireccion(){
    return $this->Direccion;
}
private function setDireccion($dire){
    $this->Direccion=$dire;
}

public function getTelefono(){
    return $this->Telefono;
}
private function setTelefono($tel){
    $this->Telefono=$tel;
} 

//Alta

function insert(){
    $rta = Conexion::conectar()->query("INSERT INTO Empresa (IDEmpresa, razonSocia, Cuit, Direccion, Telefono ) 
    values (".$this->IDEmpresa.",".$this->razonSocial.",".$this->Cuit.",".$this->Direccion.",".$this->Telefono."");
    return ($rta);
}
//Baja
function delet(){
    $rta = Conexion::conectar()->query("DELETE FROM Empresa where IDEmpresa =".$this->IDEmpresa."");
    return ($rta);
}

//Modificación
function update(){
    $rta = Conexion::conectar()->query("UPDATE Empresa set razonSocial =".$this->razonSocial.", Cuit =".$this->Cuit.", Direccion =".$this->Direccion.", Telefono =".$this->Telefono.",
     where IDEmpresa =".$this->IDEmpresa."");
    return ($rta);

    
}
static function findByID($id){
    return (Conexion::conectar()->query("SELECT * FROM Empresa WHERE IDEmpresa = ".$id));    
}    

static function listarEmpresa($where){
  return (Conexion::conectar()->query("SELECT * FROM Empresa ".$where));
}

}


?>