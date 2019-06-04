<?php
include "Usuario.php";

$_POST ['Usuario'];
$_POST ['Password'];

if (Usuario :: nombreUsuario ($_POST["Usuario"],$_POST["Password"])
{
    print_r($_POST["Usuario"],$_POST["Password"]);
}

else 
{
    echo "contrasena o usuario incorrecto";
}
exit();

?>