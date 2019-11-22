<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">
<br>
<div>
    <a class="btn btn-danger" href="../view/viewPanelDeControl.php"> Volver </a>

    <h1 align="center">Pedidos</h1>

    <h4 align="center">
        USUARIO LOGUEADO: <?php
        echo $_SESSION["Usuario"] ?>
    </h4>
</div>
<div   align="right">
    <a class="btn btn-primary" href="../controller/controllerPedido.php?action=nuevo">NUEVO PEDIDO</a>
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
                <a class="btn btn-primary"  href="../controller/controllerPedido.php?action=update&id=<?php echo $pedido->getID(); ?>">Actualizar</a>
            </td>
            <td align="center"><a class="btn btn-danger"  href="../controller/controllerPedido.php?action=confirmDelete&id=<?php echo $pedido->getID(); ?>">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>