<?php
require_once('../controller/controllerSolicitante.php'); 
?>
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
      <button type="submit" class="btn btn-secondary btn-lg" >Guardar</button>
    </p>
  </div>
</body>



 