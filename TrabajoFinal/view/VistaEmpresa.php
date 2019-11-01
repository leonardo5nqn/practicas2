<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VistaEmpresa</title>
</head>
<body>
    
   <form action="/TrabajoFinal/controller/ControllerEmpresa.php" method="POST" >
    <!-- <div>
      <label>ID EMPRESA</label>
      <input type="text" class="form-control"  name="txt_IDEmpresa" required />
    </div> -->
    <div>
    <label>RAZON SOCIAL</label>
      <input type="text" class="form-control"  name="txt_razonSocial" required />
    </div>
    <div>
      <label>CUIT</label>
      <input type="text" class="form-control"  name="txt_Cuit" required />
    </div>
       <div>
       <label>DIRECCION</label>
      <input type="text" class="form-control" name="txt_Direccion" required />
    </div>
       <div>
       <label>TELEFONO </label>
      <input type="text" class="form-control"  name="txt_Telefono" required />
    </div>
        <!-- Boton guardar -->
        
       <input type="hidden" name="accion" value="nuevo" />
    <button type="submit" id="sendlogin" class="btn btn-outline-dark"> Agregar empresa </button>
  </form>

      <!-- boton Listar -->
  <form action="/TrabajoFinal/controller/ControllerEmpresa.php" method="POST" >
      <!-- <input type="hidden" onclick="location.href='/TrabajoFinal/view/listarEmpresas.php'" value="listar" name="accion" /> -->
      <input type="hidden" name="accion" value="listar" />
      <button type="submit" class="btn btn-outline-dark"> Listar </button>
  </form> 

      <!-- boton eliminar -->
      </form>
      <!-- <form action="/TrabajoFinal/controller/ControllerEmpresa.php" method="POST" >
       <input type="hidden" name="accion" value="eliminar" />
    <button type="submit" class="btn btn-outline-dark"> Eliminar </button> -->
  </form> 
</body>
</html>