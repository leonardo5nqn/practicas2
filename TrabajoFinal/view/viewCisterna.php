<table border='1'>
	<tr>
		<td>Total Litros</td>
		<td>Nombre Cisterna</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($cisternas as $cisterna) { ?>
		
			<tr>
				<td><?php echo $cisterna->getTotalLitros();?></td>
				<td><?php echo $cisterna->getNombreCisterna();?></td>
				<td><a href="controller/controllerCisterna.php?action=editar&id=<?php echo $cisterna->getIdCisterna(); ?>">Actualizar</a> </td>
				<td><a  href="controller/controllerCisterna.php?action=eliminar&id=<?php echo $cisterna->getIdCisterna(); ?>" onclick="return $cisterna->confirmar()" class="btn btn-danger btn-xs" >Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="text-center">
    <h1 class="display-4">CISTERNA</h1>
    <div class= "card">
    <div class="card-body">
    <div class="list-group">
	<a href="../view/VistaNuevaCisterna.php">Nueva Cisterna</a>
    <table  class="table">
     <thead class="thead-light">
      <tr>
      <th scope="col">Total Litros</th>
      <th scope="col">Nombre Cisterna</th>
      <th colspan=2 >Acciones</th>
    </tr>
  </thead>
  <tbody>
	<?php
	foreach ($cisternas as $cisterna) { ?>
		
			<tr>
				<td><?php echo $cisterna->getTotalLitros();?></td>
				<td><?php echo $cisterna->getNombreCisterna();?></td>
				<td>
				<a href="controller/controllerCisterna.php?action=editar&id=<?php echo $cisterna->getIdCisterna(); ?>">Actualizar</a> 
				<a href="controllerCisterna.php?action=eliminar&id=<?php echo $cisterna->getIdCisterna(); ?>">Eliminar</a> 
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
