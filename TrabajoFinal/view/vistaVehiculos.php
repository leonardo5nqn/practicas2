<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehiculos</title>
</head>
<body>
    <table>       
        <tbody><tr><td>Patente</td><td>Marca</td><td>Modelo</td><td>Color</td><td>TipoVehiculo</td></tr></tbody>  
        <?php 
        include "../controller/controllerVehiculo.php";
        $vehiculos = Vehiculo::getAllVehiculos();
            foreach ($vehiculos as $vehiculo)  
            {
                echo '<tr><td>'.$vehiculo->Marca.'</a></td><td>'.$vehiculo->Modelo.'</td><td>'.$vehiculo->Color.'</td><td>'.$vehiculo->TipoVehiculo.'</td></tr>';  
            }
        ?>
    </table>  
</body>
</html>