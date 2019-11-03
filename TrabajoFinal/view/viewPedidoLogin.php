<?php
//creo al sesion
session_start();

//valido si se ha realizado el inicio de secion correctamkente
//sino nos retorna al viewLogin.php
if(!isset($_SESSION['usuario'])){
    header('Location: viewPedidoLogin.php');
    exit();
}

$usuario="";
$contrasena="";

//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email=isset($_POST['Usuario']) ? $_POST['Usuario'] : null;
    $contrasena=isset($_POST['Contrasena']) ? $_POST['Contrasena'] : null;

    $sql_login=("SELECT * FROM Usuario WHERE NombreUsuario = '".$usuario."' AND contrasena = '".$contrasena."'");
			
		$resultado=mysqli_query($conexion,$sql_login) or die ("Error Consultando");
			
		print($resultado);
}


?>

<p> Login a Pedido <p>

<form name="form_login" method="post" action="viewLogin.php">
    <label>Usuario: </label><input  type="text" name="Usuario">
    <label>Contrase&ntilde;a</label> <input type="password" name="Contrasena" size="20px" value="" />
    <input type="submit" name="Iniciar" value="Iniciar Sesi&oacute;n"> 
</form>