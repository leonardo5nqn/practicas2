<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<br>
<div>
    <a class="btn btn-danger" href="../controller/controllerPedido.php?action=listar"
     align="left"> Volver </a>
    <h1 align="center">Nuevo Pedido</h1>
    <h4 align="center">
        USUARIO LOGUEADO: <?php
         echo $_SESSION["Usuario"] ?>
    </h4>
</div>
<div align="center">

<form method='POST'>
    <input type='hidden' name='action' value='nuevo'>
    <table>
        <tr>

            <td><label>Solicitante</label></td>
            <td>
                <select name="IDSolicitante" class="form-control">

                    <?php
                    foreach ($solicitantes as $soli) {
                        $idSoli = $soli->getIDSolicitante();
                        $empresa = $soli->getEmpresa()->getRazonSocial();
                        $persona = $soli->getPersona()->getNombre();
                        $resultado = $empresa . '-' . $persona;

                            echo "<option value=" . $idSoli . ">" . $resultado . "</option>";
                    }


                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Chofer</label></td>
            <td>
                <select name="UsuarioID" class="form-control">
                    <?php
                    foreach ($usuarios as $unUsuario) {
                        $id = $unUsuario->getIDUsuario();
                        $nombre = $unUsuario->getUsuario();
                        echo "<option value=" . $id . ">" . $nombre . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Vehiculo</label></td>
            <td>
                <select name="VehiculoID" class="form-control">
                    <?php
                       foreach ($vehiculos as $vehiculo) {
                        $id = $vehiculo->getIdVehiculo();
                        $nombre = $vehiculo->getNumPatente() . "(".$vehiculo->getMarca().")";
                        echo "<option value=" . $id . ">" . $nombre . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Descripcion: </label></td>
            <td><input type='text' name='Descripcion' class="form-control"></td>
        </tr>
        <tr>
            <td><label>Fecha y Hora </label></td>
            <td><input type='datetime-local' name='FechaHora' class="form-control"></td>
        </tr>

    </table>
    <br>
    <input type='submit' class="btn btn-primary"  value='Guardar'>
</form>
                </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>