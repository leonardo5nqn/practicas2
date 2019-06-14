<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehiculos</title>
</head>
<body>
    <form action="..\controller\controllerVehiculo.php" method="POST" >
    <table>       
        <tbody><tr><td>Patente</td><td>Marca</td><td>Modelo</td><td>Color</td><td>TipoVehiculo</td></tr></tbody>  
           <!-- debo agregarlo en el echo del controller? -->
        <! --<?php
            foreach ($vehiculos as $vehiculo)  
            {
                echo '<tr><td>'.$vehiculo->Marca.'</a></td><td>'.$vehiculo->Modelo.'</td><td>'.$vehiculo->Color.'</td><td>'.$vehiculo->Patente.'</td><td>'.$vehiculo->TipoVehiculo.'</td></tr>';  
            }
        ?> -->
    </table>
        <input type="hidden" name="accion" value="mostrar" />
       <button type="submit" class="btn btn-outline-dark"> Listar Vehiculos </button>
    </form>
    
   <form action="..\controller\controllerVehiculo.php" method="POST" >
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Marca" name="Marca" required />
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Modelo" name="Modelo" required />
    </div>
       <div class="form-group">
      <input type="text" class="form-control" placeholder="Color" name="Color" required />
    </div>
       <div class="form-group">
      <input type="text" class="form-control" placeholder="Patente" name="Patente" required />
    </div>
       <div class="form-group">
      <input type="text" class="form-control" placeholder="TipoVehiculo" name="TipoVehiculo" required />
    </div>
       <input type="hidden" name="accion" value="nuevo" />
    <button type="submit" id="sendlogin" class="btn btn-outline-dark"> Agregar vehiculo </button>
  </form>
       <!-- debo agregarlo en el echo del controller? en donde deberia generarse la tabla -->
      <form action="..\controller\controllerVehiculo.php" method="POST" >
       <input type="hidden" name="accion" value="editar" />
    <button type="submit" class="btn btn-outline-dark"> Editar </button>
  </form> 
      </form>
       <!-- debo agregarlo en el echo del controller? en donde deberia generarse la tabla -->
      <form action="..\controller\controllerVehiculo.php" method="POST" >
       <input type="hidden" name="accion" value="eliminar" />
    <button type="submit" class="btn btn-outline-dark"> Editar </button>
  </form> 
</body>
</html>
