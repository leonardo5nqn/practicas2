<?php 
    require_once('../controller/controllerSolicitante.php'); 
        $solicitanteController = new SolicitanteController();
        $solicitantes = $solicitanteController->ver();
?>
<table border='1'>
	<tr>
		<td>Nombre</td>
		<td>Documento</td>
        <td>Telefono</td>
        <td>Email</td>
        <td>Domicilio</td>

	</tr>
<?php
	foreach ($solicitantes as $solicitante) { ?>
			<tr>
				<td><?php echo $solicitante->getPersona()->getNombre().' '.$solicitante->getPersona()->getApellido(); ?></td>
				<td><?php echo $solicitante->getPersona()->getDoc() ?></td>
                <td><?php echo $solicitante->getPersona()->getTelefono() ?></td>
                <td><?php echo $solicitante->getPersona()->getEmail() ?></td>
                <td><?php echo $solicitante->getPersona()->getDomicilio() ?></td>

			</tr>		
	<?php } ?>
</table>