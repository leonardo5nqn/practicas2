<br>
<div>
    <a href="../controller/controllerPedido.php?action=listar"> Volver </a>
    <h1 align="left">Nuevo Pedido</h1>
    <h3 align="left">
        USUARIO LOGUEADO: <?php
         echo $_SESSION["Usuario"] ?>
    </h3>
</div>
<form method='POST'>
    <input type='hidden' name='action' value='nuevo'>
    <table>
        <tr>

            <td><label>Solicitante</label></td>
            <td>
                <select name="IDSolicitante">

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
                <select name="UsuarioID">
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
                <select name="VehiculoID">
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
            <td><input type='text' name='Descripcion'></td>
        </tr>
        <tr>
            <td><label>Fecha y Hora </label></td>
            <td><input type='datetime-local' name='FechaHora'></td>
        </tr>

    </table>
    <br>
    <input type='submit' value='Guardar'>
</form>
