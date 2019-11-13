<br>
<div>
    <a href="../controller/controllerPedido.php?action=listar"> Volver </a>
    <h1 align="left">Eliminar Pedido</h1>
    <h3 align="left">
        USUARIO LOGUEADO: <?php
        echo $_SESSION["Usuario"] ?>
    </h3>
</div>
<form method='POST'>
    <input type='hidden' name='action' value='delete'>
    <input type='hidden' name='id' value='<?php echo $IDPedido ?>'>

    <br>
    <h3>Está seguro de eliminar el pedido N° <?php echo $IDPedido ?> ?</h3>
    <br>
    <input type='submit' value='ELIMINAR'>
</form>
