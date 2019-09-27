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
function __construct($IDEmpresa, $_razonSocial, $_Cuit, $_Direccion, $_Telefono)
{
    $this->setIDEmpresa($IDEmpresa);
    $this->setRazonsocial($_razonSocial);
    $this->setCuit($_Cuit);
    $this->setDireccion($_Direccion);
    $this->setTelefono($_Telefono);

}
//Get/Set atributos
public function getIDEmpresa(){
    return $this->IDEmpresa;
}
private function setIDEmpresa($_IdEmpresa){
    $this->IDEmpresa = $_IdEmpresa;
}

public function getRazonSocial(){
    return $this->razonSocial;
}
private function setRazonsocial($_rSocial){
    $this->razonSocial = $_rSocial;
}
public function getCuit(){
    return $this->Cuit;
}
private function setCuit($_setcuit){
    $this->Cuit=$_setcuit;
}
public function getDireccion(){
    return $this->Direccion;
}
private function setDireccion($_dire){
    $this->Direccion=$_dire;
}

public function getTelefono(){
    return $this->Telefono;
}
private function setTelefono($_tel){
    $this->Telefono=$_tel;
} 

//Alta

function insert(){
    $sql= "INSERT INTO Empresa (IDEmpresa, razonSocial, Cuit, Direccion, Telefono ) 
    values (".$this->IDEmpresa.",'".$this->razonSocial."','".$this->Cuit."','".$this->Direccion."','".$this->Telefono."')";
    $resultado = Conexion::conectar()->query($sql);
    var_dump ($resultado);
    print $sql;
    //verifico si Inserto por el ID
    //$resulID = mysqli_insert_id(Conexion::conectar());
    //$this->setIDEmpresa($resulID);
    
    return true;
}
//Baja
function delete(){
    $resultado = Conexion::conectar()->query("DELETE FROM Empresa where IDEmpresa =".$this->getIDEmpresa()."");
    return true;
}

//Modificación
function update(){
    $resultado = Conexion::conectar()->query("UPDATE Empresa set razonSocial ='".$this->getRazonSocial()."', Cuit ='".$this->getCuit()."', Direccion ='".$this->getDireccion()."', Telefono ='".$this->getTelefono()."'  where IDEmpresa =".$this->getIDEmpresa());

    return true;

    
}

public static function findAll (){
    $resultado = Conexion::conectar()->query("SELECT * FROM Empresa");

    if($resultado->num_rows > 0){
        $empresa=array();
        while ($row=$resultado->fetch_assoc()) {
            array_push($empresa,new Empresa($row['IDEmpresa'],$row['razonSocial'],$row['Cuit'],$row['Direccion'],$row['Telefono']));
        }
        return ($empresa);
    }
    else{
        return ("No hay registros");
    }
    
}



static function findByID($id){
    $resultado=Conexion::conectar()->query("SELECT * from Empresa where IDEmpresa = ".$id);
    if($resultado->num_rows > 0){
        $empresa=array();
        while ($row=$resultado->fetch_assoc()) {
            array_push($empresa,new Empresa($row['IDEmpresa'],$row['razonSocial'],$row['Cuit'],$row['Direccion'],$row['Telefono']));
        }
        return ($empresa);
    }
    else{
        return ("No hay registros");
    }

    //return (Conexion::conectar()->query("SELECT * FROM Empresa WHERE IDEmpresa = ".$id));    
}    

static function listarEmpresa($where){
    $resultado=Conexion::conectar()->query("SELECT * from Empresa where ".$where);
    if($resultado->num_rows > 0){
        $empresa=array();
        while ($row=$resultado->fetch_assoc()) {
            array_push($empresa,new Empresa($row['IDEmpresa'],$row['razonSocial'],$row['Cuit'],$row['Direccion'],$row['Telefono']));
        }
        return ($empresa);
    }
    else{
        return ("No hay registros");
    }
    //return (Conexion::conectar()->query("SELECT * FROM Empresa ".$where));
}

}

//-------------------------------------------------------------
//--- Pruebas Empresas
//$IDEmpresa, $_razonSocial, $_Cuit, $_Direccion, $_Telefono
//________________________________________----------------------
//funciona (testeado 24/9)
//$instaPrueEmpresa = new Empresa ('null','Avenida','2043637','Lainez 234','2994637936');
//$instaPrueEmpresa->insert();
//var_dump($instaPrueEmpresa);
//echo ("Hola mundo");

//Comillas ($a=pepe;)
//comillas simples '' solo imprime el textos de $a (pantalla-> $a);
//comillas Dobles "" imprime el contenido de la variable $a (pantalla-> pepe);

//borrar una empresa
//funciona Testeado 24/9
//$reso = Empresa::findAll()[1]->delete();
//var_dump($reso);

//Traigo todas las empresas
//funciona testeado 24/9
//$reso = Empresa::findAll();
//var_dump ($reso);

//traigo todo por ID (Funciona: testeado 24/9)
//$reso = Empresa::findByID(2);
//var_dump($reso);

//update (verificar el objeto a modificar)
//$reso = Empresa::findByID(2);
//var_dump($reso);
//$objet=new Empresa ($reso);
//$objet->setRazonsocial("Chino");
//$objet->update();
//var_dump($objet); exit;

//echo ("Prueba de Conexion");
?>