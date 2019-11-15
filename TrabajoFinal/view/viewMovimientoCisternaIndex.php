<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
  <div class="row justify-content-lg-center">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Playero</th>
          <th scope="col">Fecha y Hora</th>
          <th scope="col">Litros</th>
          <th scope="col">Tipo de Carga</th>
          <th scope="col">Cisterna</th>
          <th scope="col">Porcentaje</th>
          <th scope="col">Pedido</th>
        </tr>
      </thead>
      <?php 
        if($movimientos !== 'No existen registros.'){
            foreach ($movimientos as $movimiento){ 
        ?>
      <tbody>
        <tr>
          <td><?php echo $movimiento->getUsuario()->getPersona()->getNombre()." ".$movimiento->getUsuario()->getPersona()->getApellido(); ?></td>
          <td><?php echo $movimiento->getFechaHora();?></td>
          <td><?php echo $movimiento->getLitros();?></td>
          <td><?php echo $movimiento->getTipoCarga()->getDescripcion();?></td>
          <td><?php echo $movimiento->getCisterna()->getNombreCisterna();?></td>
          <td><?php echo $movimiento->getPorcentaje();?></td>
          <td><?php echo $movimiento->getIDPedidoVehiculoCarga();?></td>
          <td><a href="controllerMovimientoCisterna.php?action=update&id=<?php echo $movimiento->getID(); ?>"> Actualizar </a></td>
          <td><a href="controllerMovimientoCisterna.php?action=delete&id=<?php echo $movimiento->getID(); ?>"> Eliminar </a></td>
        </tr>
      </tbody>
      <?php
            } 
        }
        ?>
    </table>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
