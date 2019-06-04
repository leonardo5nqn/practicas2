<?php
include "Usuario.php";

$_POST ['usuario'];
$_POST ['password'];

if (Usuario :: nombreUsuario ($_POST["usuario"],$_POST["password"])
{
    print_r($_POST["usuario"],$_POST["password"]);
}

else 
{
    echo "contrasena o usuario incorrecto";
}
exit();

?>