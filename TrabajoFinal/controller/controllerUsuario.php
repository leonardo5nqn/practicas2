<?php
include "usuario.php";

$_POST ['nombre'];
$_POST ['Password'];

if (usuario :: nombreUsuario ($_POST["nombre"],$_POST["Password"])
{
    print_r($_POST["nombre"],$_POST["Password"]);
}

else 
{
    echo "contrasena o usuario incorrecto";
}
exit();

?>