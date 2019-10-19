
<table border='1'>
	<tr>
		<td>Persona</td>
		<td>Telefono</td>
        <td>Documento</td>
        <td>FechaNacimiento</td>
        <td>Domicilio</td>
        <td>Email</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($personas as $persona) { ?>
		
			<tr>
				<td><?php echo $persona->getNombre().' '.$persona->getApellido(); ?></td>
				<td><?php echo $persona->getTelefono(); ?></td>
                <td><?php echo $persona->getDoc(); ?></td>
                <td><?php echo $persona->getFNacimiento(); ?></td>
                <td><?php echo $persona->getDomicilio(); ?></td>
                <td><?php echo $persona->getEmail(); ?></td>
				<td><a href="controller/controllerPersona.php?action=update&id=<?php echo $persona->getpersonaid(); ?>">Actualizar</a> </td>
				<td><a href="controllerPersona.php?action=delete&id=<?php echo $persona->getpersonaid(); ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>
