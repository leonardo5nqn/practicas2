<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VistaEmpresa</title>
</head>
<body>
    
   <form action="" method="POST" >
    <div class="form-group">
      <input type="text" class="form-control" placeholder="IDEmpresa" name="IDEmpresa" required />
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="razonSocial" name="razonSocial" required />
    </div>
       <div class="form-group">
      <input type="text" class="form-control" placeholder="Cuit" name="Cuit" required />
    </div>
       <div class="form-group">
      <input type="text" class="form-control" placeholder="Direccion" name="Direccion" required />
    </div>
       <div class="form-group">
      <input type="text" class="form-control" placeholder="Telefono" name="Telefono" required />
    </div>
       <input type="hidden" name="accion" value="nuevo" />
    <button type="submit" id="sendlogin" class="btn btn-outline-dark"> Agregar empresa </button>
  </form>
      <form action="" method="POST" >
       <input type="hidden" name="accion" value="editar" />
    <button type="submit" class="btn btn-outline-dark"> Editar </button>
  </form> 
      </form>
      <form action="" method="POST" >
       <input type="hidden" name="accion" value="eliminar" />
    <button type="submit" class="btn btn-outline-dark"> Eliminar </button>
  </form> 
</body>
</html>