<!-- <?php
session_start(); //Iniciamos la Sesion o la Continuamos
?> -->
<div>
    <h1 align="left">Panel de Control</h1>
    <h3 align="left">
        USUARIO LOGUEADO: <?php
        
        //var_dump($_SESSION);
        echo $_SESSION["Usuario"] ?>
    </h3>
</div>
<table border="1">

    <tr>

        <td>
            <a style="text-decoration:none; font-size: 30px; margin:130px; padding: 20px;"
               href="../controller/controllerPedido.php?action=listar">Pedido</a>
        </td>

        <td>
            <a style="text-decoration:none; font-size: 30px; margin:130px; padding: 20px;"
            href="../controller/controllerCisterna.php?action=index">Cisterna</a>
        </td>

        <td>
            <a style="text-decoration:none; font-size: 30px; margin:130px; padding: 20px;"
            href="../view/viewEmpresaSolicitante.php">Empresa</a>
        </td>

    </tr>
    <tr align="center">

    </tr>


</table>
<a
    href="../controller/controllerLogin.php?action=logout">CERRAR SESION</a>
