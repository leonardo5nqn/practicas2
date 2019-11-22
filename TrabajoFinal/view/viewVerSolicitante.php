
<table border='1'>
	<tr>
		<td>Nombre completo</td>
		<td>Documento</td>
        <td>Telefono</td>
        <td>Email</td>
        <td>Domicilio</td>
		<td>empresa</td>

	</tr>
<?php
	foreach ($solicitantes as $solicitante) { ?>
			<tr>
				<td><?php echo $solicitante->getPersona()->getNombre().' '.$solicitante->getPersona()->getApellido(); ?></td>
				<td><?php echo $solicitante->getPersona()->getDoc() ?></td>
                <td><?php echo $solicitante->getPersona()->getTelefono() ?></td>
                <td><?php echo $solicitante->getPersona()->getEmail() ?></td>
                <td><?php echo $solicitante->getPersona()->getDomicilio() ?></td>
				<td><?php echo $solicitante->getEmpresa()->getRazonSocial() ?></td>


			</tr>		
	<?php } ?>
</table>