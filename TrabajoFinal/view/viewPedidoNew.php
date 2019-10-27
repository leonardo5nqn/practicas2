<p>Nuevo de Pedido</p>

<form action='../controller/controllerPedido.php' method='post'>
	<input type='hidden' name='action' value='new'>
	<table>
		<tr>
			<td><label>Solicitante</label></td>
			<td>
				<select name="Solicitante">
					
					<?php
						require_once('../model/Solicitante.php');
						
						$arraySolicitante=Solicitante::findAll();

						var_dump ($arraySolicitante);

						foreach ($arraySolicitante as $soli) {
							$idSoli=$soli->getIsSolicitante();
							$empresa = $soli->getEmpresa()->getRazonSocial();
							$persona = $soli->getPersona()->getNombre();
							$resultado = $empresa.'-'.$persona;

							var_dump($resultado);	

							echo "<option value=".$idSoli.">".$resultado."</option>";
						}


					?>
				</select> 
			</td>
		</tr>
		<tr>
			<td><label>Usuario</label></td>
			<td>
				<select name="Usuario">
					<option selected value="1"></option>
					<?php
						//inserto los valores del combo
						
					?>
				</select> 
			</td>
		</tr>
		<tr>
			<td><label>Descripcion: </label></td><td><input type='text' name='Descripcion'></td>
		</tr>
		<tr>
			<td><label>Fecha y Hora </label></td><td><input type='datetime-local' name='FechaHora'></td>
		</tr>
		
	</table>
		
	<input type='submit' value='Guardar'>
</form>
