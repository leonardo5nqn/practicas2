<br>
<div>
    <a href="../controller/controllerPedido.php?action=listar"> Volver </a>
    <h1 align="left">Actualizar Pedido</h1>
    <h3 align="left">
        USUARIO LOGUEADO: <?php
        echo $_SESSION["Usuario"] ?>
    </h3>
</div>
<form method='POST'>
    <input type='hidden' name='action' value='update'>
    <table>
        <tr>
            <?php
            $id = $pedido->getID();
            $IDSolicitante = $pedido->getSolicitante()->getIDSolicitante();
            $idUsuario = $pedido->getUsuario()->getIDUsuario();
            $descripcion = $pedido->getDescripcion();
            // Convertir a datetime
            $myDateTime = new DateTime($pedido->getFechaHora());
            $fechaYHora = $myDateTime->format('Y-m-d\TH:i');

            echo "<td><label>ID</label></td>";
            echo "<td> <input type='text' readonly name='IDPedido' value=$id></td>";
            ?>
        </tr>
        <tr>

            <td><label> Solicitante</label></td>
            <td>
                <select name="IDSolicitante">

                    <?php
                    foreach ($solicitantes as $soli) {
                        $idSoli = $soli->getIDSolicitante();
                        $empresa = $soli->getEmpresa()->getRazonSocial();
                        $persona = $soli->getPersona()->getNombre();
                        $resultado = $empresa . '-' . $persona;
                        if (isset($IDSolicitante) && $IDSolicitante == $idSoli) {
                            echo "<option selected value=" . $idSoli . ">" . $resultado . "</option>";
                        } else {
                            echo "<option value=" . $idSoli . ">" . $resultado . "</option>";
                        }
                    }


                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Usuario</label></td>
            <td>
                <select name="idUsuario">
                    <?php
                    require_once('../model/Usuario.php');
                    $usuarios = Usuario::findAll();
                    foreach ($usuarios as $unUsuario) {
                        $id = $unUsuario->getIDUsuario();
                        $nombre = $unUsuario->getUsuario();
                        echo "<option value=" . $id . ">" . $nombre . "</option>";
                        if (isset($idUsuario) && $idUsuario == $id) {
                            echo "<option selected value=" . $id . ">" . $nombre . "</option>";
                        } else {
                            echo "<option value=" . $id . ">" . $nombre . "</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Descripcion: </label></td>
            <td><input type='text' name='Descripcion' value="<?php echo $descripcion; ?>"></td>
        </tr>
        <tr>
            <td>
                <label>
                    <br>Fecha y Hora </label></td>
            <td>
                <input type='datetime-local' name='FechaHora'
                       value="<?php echo $fechaYHora ?>"></td>
        </tr>

    </table>
    <br>
    <input type='submit' value='Guardar'>
</form>
