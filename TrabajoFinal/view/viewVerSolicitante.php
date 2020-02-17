
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div>
    <a class="btn btn-danger" href="../view/viewEmpresaSolicitante.php"> Volver </a>

</div>
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
      <th scope="col">Telefono</th>
	  <th scope="col">Email</th>
	  <th scope="col">Domicilio</th>
	  <th scope="col">Empresa</th>

      
    </tr>
  </thead>
  <tbody>
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
  </tbody>
    </table>
</div>
</div>
    </div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 