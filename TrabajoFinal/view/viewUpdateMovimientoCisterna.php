<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h2>Actualizar un Movimiento de cisterna</h2>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="card">
            <div class="card-body">
                <form action='/TrabajoFinal/controller/controllerMovimientoCisterna.php' method='post' class="form-group">
                <input type='hidden' name='action' value='update'>
                <input type='hidden' name='id' <?php echo'value="'.$movimientoCisterna->getID().'"'?>>
                Playero:
                <select name="IDUsuario" required>
                    <?php
                    $selected = $movimientoCisterna->getUsuario()->getIDUsuario();
                    foreach($playeros as $row){
                        if($selected === $row->getIDUsuario()){
                            echo '<option value='.$row->getIDUsuario().' selected >'.$row->getPersona()->getNombre().' '.$row->getPersona()->getApellido().'</option>';
                        } else {
                            echo '<option value='.$row->getIDUsuario().'>'.$row->getPersona()->getNombre().' '.$row->getPersona()->getApellido().'</option>';
                        }
                    }	
                ?>
                </select>
                <br>
                <br> Fecha:
                <input type="datetime-local" name="FechaHora" class="form-control" <?php echo 'value="'.$movimientoCisterna->getFechaHora().'"'?> required>
                <br> Litros:
                <input type="number" name="Litros" class="form-control" <?php echo 'value="'.$movimientoCisterna->getLitros().'"'?> required>
                <br> Tipo de Carga:
                <select name="IDTipoCarga">
                    <?php
                    $selected = $movimientoCisterna->getTipoCarga()->getID();
                    foreach($cargas as $carga){
                        if($selected === $carga->getID()){
                            echo '<option value='.$carga->getID().' selected>'.$carga->getDescripcion().'</option>';
                        } else {
                            echo '<option value='.$carga->getID().'>'.$carga->getDescripcion().'</option>';
                        }
                    }
                ?>
                </select>
                <br>
                <br> Cisterna:
                <select name="IDCisterna" required>
                    <?php
                    $id = $movimientoCisterna->getCisterna()->getID();
                    foreach($cisternas as $row){
                      if($id === $row->getID()){
                          echo '<option value='.$row->getID().' selected >'.$row->getNombreCisterna().'</option>';
                     }else{
                          echo '<option value='.$row->getID().'>'.$row->getNombreCisterna().'</option>';
                     }
                    }	
                ?>
                </select>
                <br>
                <br> ID Pedido Vehiculo Chofer:
                <select name="IDPedidoVehiculoChofer" required>
                    <?php
                    $pedidoVehiculo = $movimientoCisterna->getIDPedidoVehiculoCarga();
                    foreach($pedidos as $pedido){
                     if($pedidoVehiculo === $pedido->getID()){
                        echo '<option value='.$pedido->getID().' selected >'.$pedido->getID().'</option>';
                    } else {
                        echo '<option value='.$pedido->getID().'>'.$pedido->getID().'</option>';
                    }
                }
                ?>
                </select>
                <br>
                <br>
                <input type='submit' value='Guardar' class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
