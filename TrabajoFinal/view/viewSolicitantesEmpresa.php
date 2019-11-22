<?php
require_once('../controller/controllerSolicitante.php');
?>
<div class="text-center">
    <h1 class="display-4">Ingresar solicitante</h1>
    <div class= "card">
    <div class="card-body">
  </thead>
  <tbody>
<form action = '../controller/controllerNuevoSolicitante.php' method="post">
<input name="action" type="hidden" value="nuevo">
 
<table>
  Nombre:<br>
  <input type="text" name="Nombre" required><br>
  Apellido:<br>
  <input type="text" name="Apellido" minlength="1" maxlength="11" required><br>
  Telefono:<br>
  <input type="text" name="Telefono" required><br>
  Documento:<br>
  <input type="text" name="Documento" required><br>
  Fecha nacimiento:<br>
  <input type="Date" name="FechaNacimiento" required><br>
  Domicilio:<br>
  <input type="text" name="Domicilio" required><br>
  Email:<br>
  <input type="text" name="Email" required><br>
  <input type='hidden' name='IDEmpresa' value="<?php echo $id; ?>" >
  </table>
  </tbody>
  <br>
  <button type="submit" class="btn btn-secondary btn-lg" >Guardar</button><br>
</form>
</div>
</div>
</div>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="text-center">
    <h1 class="display-4">Lista de solicitantes</h1>
    <div class= "card">
    <div class="card-body">
    <div class="list-group">
    <table  class="table">
     <thead class="thead-light">
      <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Documento</th>
      <th scope="col">Domicilio</th>
      <th scope="col">Empresa</th>
      
    </tr>
  </thead>
  <tbody>
	<?php
  require_once('../controller/controllerSolicitante.php'); 
  $solicitanteController = new SolicitanteController();
 $solicitantes = $solicitanteController->ver();

	foreach ($solicitantes as $solicitante) { ?>
		
			<tr>
				<td><?php echo $solicitante->getPersona()->getNombre().' '.$solicitante->getPersona()->getApellido();?></td>
				<td><?php echo $solicitante->getPersona()->getDoc();?></td>
        <td><?php echo $solicitante->getPersona()->getDomicilio();?></td>
        <td><?php echo $solicitante->getEmpresa()->getRazonSocial() ?></td>
        
			</tr>		
	<?php } ?>  
  </tbody>
    </table>
</div>
</div>
    </div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 