<?php
include "usuario.php";

$_POST ['nombre'];
$_POST ['contraseña'];

if (usuario :: nombreUsuario ($_POST["nombre"],$_POST["contraseña"])
{
    print_r($_POST["nombre"],$_POST["contraseña"]);
}

else 
{
    echo "contraseña o usuario incorrecto";
}
exit();

?>