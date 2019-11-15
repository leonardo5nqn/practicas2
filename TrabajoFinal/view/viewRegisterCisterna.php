<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h2>Registrar una cisterna</h2>
<div class="container">
    <div class="row justify-content-md-center">
      <div class= "card">
        <div class="card-body">
          <form action='/TrabajoFinal/controller/controllerCisterna.php?action=new' method='post' class="form-group">
            <input type='hidden' name='action' value='new'>
            <br> Nombre de la cisterna: 
            <input type="text" name="NombreCisterna" class="form-control" required>
            <br> Capacidad de carga: 
            <input type="number" name="TotalLitros" class="form-control" required>
            <br>
            <input type='submit' value='Guardar' class="btn btn-primary">
          </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
