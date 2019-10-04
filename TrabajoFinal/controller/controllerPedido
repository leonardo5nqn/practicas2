<?php
include "../model/Pedido.php";
switch ($_POST["accion"]){
    case ('nuevo'):
    if (!empty($_POST['Solicitante']) && !empty($_POST['Usuario']) && !empty($_POST['Descripcion']) && !empty($_POST['FechaHora']))
    {
        $pedido = new Pedido(null, Solicitante::findByID($_POST['Solicitante']['idSolicitante']), Usuario::findByID($_POST['Usuario']['idUsuario']), $_POST['Descripcion'], $_POST['FechaHora']);
        if ($pedido->insert() === 'Registro insertado correctamente')
        {
            echo "Pedido creado correctamente."; 
        }else{
            echo "Error creando el pedido."; 
        }
    }
    else
    {
        echo "Campos incompletos.";
    }
    break;
    case ('eliminar'):
    break;
    case ('editar'):
    if (!empty($_POST['Pedido']))
    {
        if (Pedido::findById($_POST['Pedido']['pedidoID'])->update() === 'Registro actualizado correctamente')
        {
            echo "Se actualizó correctamente.";
        }
        else
        {
            echo "No se pudo actualizar el pedido.";
        }
    }
    else
    {
        echo "No se pudo actualizar el pedido.";
    }
    break;
    case ('listar'):
    $pedidos = Pedido::findAll();
    if ($pedidos === 'No existen registros.')
    {
        echo "No existen registros."
    }
    else
    {
        echo "<table class="'table'"><thead><tr><th>Solicitante</th><th>Usuario</th><th>Descripción</th><th>Fecha y Hora</th></tr></thead><tbody>";
        foreach($pedido as $pedidos){
            echo "<tr>";
            echo "<td>".$person['name']."</td>";
            echo "<td>".$person['name']."</td>";
            echo "<td>".$person['name']."</td>";
            echo "<td>".$person['name']."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    break;
}
?> 
