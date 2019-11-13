<br>
<div>
    <a href="../view/viewPanelDeControl.php"> Volver </a>

    <h1 align="left">Pedidos</h1>

    <h3 align="left">
        USUARIO LOGUEADO: <?php
        echo $_SESSION["Usuario"] ?>
    </h3>
</div>
<div   align="right">
    <a href="../controller/controllerPedido.php?action=nuevo">NUEVO PEDIDO</a>
</div>
<table border='1' style="width: 100%">

    <tr>
        <td>Solicitante</td>
        <td>Usuario</td>
        <td>Descripción</td>
        <td>Fecha y Hora</td>
        <td colspan=2 align="center"> Acciones</td>
    </tr>
    <?php
    foreach ($pedidos as $pedido) { ?>
        <tr>
            <td><?php echo $pedido->getSolicitante()->getPersona()->getNombre() . ' ' . $pedido->getSolicitante()->getPersona()->getApellido(); ?></td>
            <td><?php echo $pedido->getUsuario()->getUsuario(); ?></td>
            <td><?php echo $pedido->getDescripcion(); ?></td>
            <td><?php echo $pedido->getFechaHora(); ?></td>

            <td align="center">
                <a href="../controller/controllerPedido.php?action=update&id=<?php echo $pedido->getID(); ?>">Actualizar</a>
            </td>
            <td align="center"><a href="../controller/controllerPedido.php?action=confirmDelete&id=<?php echo $pedido->getID(); ?>">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
