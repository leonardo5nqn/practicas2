<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">
<br>
<p>
<a class="btn btn-danger"
    href="../controller/controllerLogin.php?action=logout">CERRAR SESION</a>
</p>
<div>
    <h1 align="center">Panel de Control</h1>
    <h4 align="center">
        USUARIO LOGUEADO: <?php
        
        //var_dump($_SESSION);
        echo $_SESSION["Usuario"] ?>
    </h4>
</div>
<table border="1" class=" table table-bordered ">

    <tr>

        <td>
            <a  class="btn btn-primary" 
            style="text-decoration:none; font-size: 30px; margin:80px; padding: 30px;"
               href="../controller/controllerPedido.php?action=listar">Pedido</a>
        </td>

        <td>
            <a  class="btn btn-warning"  style="text-decoration:none; font-size: 30px; margin:80px; padding: 30px;"
            href="../controller/controllerCisterna.php?action=index">Cisterna</a>
        </td>

        <td>
            <a  class="btn btn-danger"  style="text-decoration:none; font-size: 30px; margin:80px; padding: 30px;"
            href="../view/viewEmpresaSolicitante.php">Empresa</a>
        </td>

    </tr>
    <tr align="center">
        
    </tr>


</table>


<!-- <a class="btn btn-danger"
    href="../controller/controllerLogin.php?action=logout">CERRAR SESION</a> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>