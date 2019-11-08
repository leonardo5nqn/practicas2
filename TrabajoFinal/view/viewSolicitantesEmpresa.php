<?php
require_once('../controller/controllerSolicitante.php');
?>

<div class="text-center">
    <h1 class="display-4">Ingresar Solicitante</h1>
    <div class= "card">
    <div class="card-body">
  </thead>
  <tbody>
<form action = '../controller/controllerSolicitante.php?action=new' method="post">
<input name="action" type="hidden" value="new">
 
<table>

            Persona: 
            <select name="IDPersona" required>
              <?php
                    require_once('../controller/controllerPersona.php'); 
                    $personaController = new PersonaController();
                    $valores = $personaController->ver();
                    //print_r($valores);
         
                     foreach ($valores as $valor) {
                       //var_dump($valor);
                       $nombre =  $valor->getNombre().' '. $valor->getApellido();
                       $id = $valor->getpersonaid();
                       echo '<option value="'.$id.'">'.$nombre.'</option>';
                       }
                ?>
            </select> 

  <br>
  Empresa:
  <select name="IDEmpresa" required>
              <?php
                    require_once('../controller/controllerEmpresa.php'); 
                    $sempresaController = new EmpresaController();
                   $valores = $sempresaController->ver();
                   //print_r($valores);
         
                     foreach ($valores as $valor) {
                       //var_dump($valor);
                       $nombre =  $valor->getRazonSocial();
                       $id = $valor->getIDEmpresa();
                       echo '<option value="'.$id.'">'.$nombre.'</option>';
                       }
                ?>
            </select> 
  </table>
  </tbody>
  <br>
  <button type="submit" class="btn btn-secondary btn-lg" >Guardar</button><br>
</form>
</div>
</div>
</div>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="text-center">
    <h1 class="display-4">Lista de solicitantes</h1>
    <div class= "card">
    <div class="card-body">
    <div class="list-group">
    <table  class="table">
     <thead class="thead-light">
      <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Documento</th>
      <th scope="col">Domicilio</th>
      <th scope="col">Empresa</th>
      
    </tr>
  </thead>
  <tbody>
	<?php
  require_once('../controller/controllerSolicitante.php'); 
  $solicitanteController = new SolicitanteController();
 $solicitantes = $solicitanteController->ver();
 //print_r($valores);

	foreach ($solicitantes as $solicitante) { ?>
		
			<tr>
				<td><?php echo $solicitante->getPersona()->getNombre().' '.$solicitante->getPersona()->getApellido();?></td>
				<td><?php echo $solicitante->getPersona()->getDoc();?></td>
        <td><?php echo $solicitante->getPersona()->getDomicilio();?></td>
        <td><?php echo $solicitante->getEmpresa()->getRazonSocial() ?></td>
        
			</tr>		
	<?php } ?>  
  </tbody>
    </table>
</div>
</div>
    </div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





<head>
  <title>Demo de menú desplegable</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="generator" content="Geany 1.23.1" />
</head>
 
<body>
  <div align="center">
    <h1>Demo de menú desplegable</h1>
 
    <p>Seleccione un solicitante del siguiente menú:</p>
    <p>solicitante:
<input name="action" type="hidden" value="new">
      <select>
        <option value="0">Selección:</option>
        
        <?php
            require_once('../controller/controllerSolicitante.php'); 
            $solicitanteController = new SolicitanteController();
           $valores = $solicitanteController->ver();
           //print_r($valores);
 
             foreach ($valores as $valor) {
               //var_dump($valor);
               $nombre =  $valor->getPersona()->getNombre();
               $id = $valor->getIDSolicitante();
               echo '<option value="'.$id.'">'.$nombre.'</option>';
               }
        ?>
      </select>
      <input type='submit' value='Guardar' class="btn btn-primary">
    </p>
  </div>
</body>



 