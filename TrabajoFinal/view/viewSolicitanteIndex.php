
<table border='1'>
	<tr>
		<td>Persona</td>
		<td>Empresa</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($solicitantes as $solicitante) { ?>
		
			<tr>
				<td><?php echo $solicitante->getPersona()->getNombre().' '.$solicitante->getPersona()->getApellido(); ?></td>
				<td><?php echo $solicitante->getEmpresa()->getRazonSocial(); ?></td>
				<td><a href="controller/controllerSolicitante.php?action=update&id=<?php echo $solicitante->getIdSolicitante(); ?>">Actualizar</a> </td>
				<td><a href="controller/controllerSolicitante.php?action=delete&id=<?php echo $solicitante->getIdSolicitante(); ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>
