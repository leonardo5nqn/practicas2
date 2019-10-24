<table border='1'>
  <tr>
    <td>Razon Social</td>
    <td>Cuit</td>
    <td>Direccion</td>
    <td>Telefono</td>
    <td colspan=2>Acciones</td>
  </tr>
  
  <?php
    foreach ($empresa as $empresa){ ?>
        <tr>
            <td> <?php echo $empresa->getRazonSocial();?></td>
            <td> <?php echo $empresa->getCuit(); ?></td>
            <td> <?php echo $empresa->getDireccion(); ?></td>
            <td> <?php echo $empresa->getTelefono(); ?></td>
            <td> <a href="controller/controllerEmpresa.php?action=update&id=<?php echo $empresa->getIDEmpresa(); ?>">Actualizar </a></td>
            <td> <a href="controller/controllerEmpresa.php?action=delete&id=<?php echo $empresa->getIDEMpresa(); ?>">Eliminar</a></td>
        </tr>

    <?php } ?>

</table>