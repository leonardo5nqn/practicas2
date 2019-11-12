<div class="text-center">
    <h1 class="display-4">Empresa</h1>
    <div class= "card">
    <div class="card-body">
  </thead>
  <tbody>
<form action = '../controller/controllerEmpresa.php' method="post">
<input name="action" type="hidden" value="new">
 
<table>
  Razon Social:<br>
  <input type="text" name="razonSocial" required><br>
  Cuit:<br>
  <input type="text" name="Cuit" required><br>
  Direccion:<br>
  <input type="text" name="Direccion" required><br>
  Telefono:<br>
  <input type="text" name="Telefono" required><br>
  </table>
  </tbody>
  <br>  
  <button type="submit" class="btn btn-secondary btn-lg" >Guardar</button><br>
</form>
</div>
</div>
</div>
</div>

<?php
/*
validar cuit con html5 numerico 
<a href="../view/viewSolicitantesEmpresa.php">ADD Solicitante</a>
<a href="../view/viewVerSolicitante.php">ver Solicitantes</a>
*/
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="text-center">
    <h1 class="display-4">Empresa</h1>
    <div class= "card">
    <div class="card-body">
    <div class="list-group">
    <table  class="table">
     <thead class="thead-light">
      <tr>
      <th scope="col">Razon Social</th>
      <th scope="col">Cuit</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Borrar</th>
      <th colspan=2 >Acciones</th>
    </tr>
  </thead>
  <tbody>
	<?php
  require_once('../controller/controllerEmpresa.php'); 
  $empresaController = new EmpresaController();
 $empresas = $empresaController->ver();
 //print_r($valores);

	foreach ($empresas as $empresa) { ?>
		
			<tr>
				<td><?php echo $empresa->getRazonSocial();?></td>
				<td><?php echo $empresa->getCuit();?></td>
        <td><?php echo $empresa->getDireccion();?></td>
        <td><?php echo $empresa->getTelefono();?></td>
        <td><a href="../controller/controllerEmpresa.php?action=delete&id=<?php echo $empresa->getIDEmpresa(); ?>">Eliminar</a> </td>
				<td>
				<a href="../view/viewSolicitantesEmpresa.php">ADD Solicitante </a>
        <a href="../view/viewVerSolicitante.php">ver Solicitantes</a>
				</td>
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