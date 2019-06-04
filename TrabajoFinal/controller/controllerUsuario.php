<?php
include "../model/Usuario.php";

if(!empty($_POST['Usuario']) && !empty($_POST['Password'])) 
{
    if (Usuario :: validoUsuario ($_POST["Usuario"],$_POST["Password"]))
    {
    print_r($_POST["Usuario"],$_POST["Password"]);
    }
    else 
    {
    echo "contrasena o usuario incorrecto";
    }
   
}
else 
    {
    echo "es necesario que completes los campos";
    }

exit();

?>