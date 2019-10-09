<html>

<body>
    <div align="center">
            	<table aling="center" border="1px" >
                    <tr>
                    	<th><h3>ID EMpresa</h3></th>
                        <th><h3>Razon Socail</h3></th>
                        <th><h3>Cuit</h3></th>
                        <th><h3>Direccion</h3></th>
                        <th><h3>Telefono</h3></th>
                    </tr>
                    <!-- tengo que generar un array de Objetos -->
                    <?php
                        foreach($lista as $row){
							echo "<tr><td>".$row['IDEmpresa']."</td>";
                            echo "<td>".$row['razonSocial']."</td>";
                            echo "<td>".$row['cuit']."</td>";
                            echo "<td>".$row['direccion']."</td>";
							echo "<td>".$row['telefono']."</td>";
							echo "<td>".'<a href=""> Eliminar </a>'."</td></tr>";
                        }
                        //LIBERO LOS RESULTADOS
                        
                    ?>
                </table>
            </div>
            <div align="center">
            <input type="button" onclick="location.href='/TrabajoFinal/view/VistaEmpresa.php'" name="btn_atras" value="Atras" style='width:125px; height:40px'/>
            </div>
    
</body>
</html>
<?
require_once ("../model/Empresa.php");



?>