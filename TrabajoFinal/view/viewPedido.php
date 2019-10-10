<table border='1'>
	<tr>
		<td>Solicitante</td>
		<td>Usuario</td>
		<td>Descripción</td>
		<td>Fecha y Hora</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($pedidos as $pedido) { ?>
		
			<tr>
				<td><?php echo $pedido->getSolicitante()->getPersona()->getNombre().' '.$pedido->getSolicitante()->getPersona()->getApellido(); ?></td>
				<td><?php echo $pedido->getusuario()->getUsuario(); ?></td>
				<td><?php echo $pedido->getDescripcion();?></td>
				<td><?php echo $pedido->getFechaHora();?></td>
				<td><a href="controller/controllerPedido.php?action=update&id=<?php echo $pedido->getID(); ?>">Actualizar</a> </td>
				<td><a href="controller/controllerPedido.php?action=delete&id=<?php echo $pedido->getID(); ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>
