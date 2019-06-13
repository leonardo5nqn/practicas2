<?php
include "../model/Usuario.php";

if(!empty($_POST['Usuario']) && !empty($_POST['Password'])) 
{
    if (Usuario::validoUsuario ($_POST["Usuario"],$_POST["Password"]))
    {
    print_r($_POST["Usuario"],$_POST["Password"]);
    }
    else 
    {
    echo "Contrasena o usuario incorrecto";
    }
   
}
else 
    {
    echo "Es necesario que completes los campos";
    }



exit();


    function formUsuario(){
        if (!empty($_POST['IDPersona']) && !empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Telefono']) && !empty($_POST['Documento']) && !empty($_POST['FechaNacimiento']) && !empty($_POST['Domicilio']) && !empty($_POST['Email'])){
            
            if(Usuario::insertPersona ($_POST['IDPersona'], $_POST['Nombre'], $_POST['Apellido'], $_POST['Telefono'], $_POST['Documento'], $_POST['FechaNacimiento'], $_POST['Domicilio'], $_POS['Email']));
        }
        else if(!empty($_POST['IDUsuario']) && !empty($_POST['PersonaID']) && !empty($_POST['RolID']) && !empty($_POST['NombreUsuario'])&& !empty($_POST['Contrasena'])&& !empty($_POST['Huella']))
        {
            if(Usuario::insertUsuario ($_POST['IDUsuario'], $_POST['PersonaID'], $_POST['RolID'], $_POST['NombreUsuario'], $_POST['Contrasena'], $_POST['Contrasena'],  $_POST['Huella'])){
            }  else{
                echo "Completamente los campos obligatorios";
            }

        }
    
    
    }




?>