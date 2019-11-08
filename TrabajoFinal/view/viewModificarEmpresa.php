<div class="text-center">
    <h1 class="display-4">modificar Empresa</h1>
    <div class= "card">
    <div class="card-body">
  </thead>
  <tbody>
<form action = '../controller/ControllerEmpresa.php' method="post">
<input name="action" type="hidden" value="update">
 
<table>
  Razon Social:<br>
  <input type="text" name="razonSocial" required><br>
  Cuit:<br>
  <input type="number" name="Cuit" minlength="1" maxlength="11" required><br>
  Direccion:<br>
  <input type="text" name="Direccion" required><br>
  Telefono:<br>
  <input type="text" name="Telefono" required><br>
  </table>
  </tbody>
  <br>
  <button type="submit" class="btn btn-secondary btn-lg" >Guardar</button><br>
</form>
</div>
</div>
</div>
</div>

