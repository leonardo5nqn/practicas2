<html>
    <head>
        Listar Personas
    </head>
    <body>
        <div>
                <H2>Listar y Modificar PERSONAS</H2>
        </div>
        <div>
        <?php 
                include "..\model/Usuario.php";
                //$resultado=  Usuario::mostrarUsuario();
                //Tengo que llamar a la funcion mostrar persona
            ?>
            <!-- Creo mi formulario y genero los encabezados de la tabla-->
            <form action="..\controller\controllerUsuario.php" method="POST">
                <table aling="center" border="1px" >
                        <tr>
                            
                            <th><h3>ID Persona</h3></th>
                            <th><h3>Nombre</h3></th>
                            <th><h3>Apellido</h3></th>
                            <th><h3>Telefono</h3></th>
                            <th><h3>Documento</h3></th>
                            <th><h3>FechaNacimiento</h3></th>
                            <th><h3>Domicilio</h3></th>
                            <th><h3>Email</h3></th>
                        </tr>
                        <?php
                            //genero un while para recorrer el arreglo
                            while($row=mysqli_fetch_array($resultado)){
                                echo "<tr><td>".$row['IDPersona']."</td>";
                                echo "<td>".$row['Nombre']."</td>";
                                echo "<td>".$row['Apellido']."</td>";
                                echo "<td>".$row['Telefono']."</td>";
                                echo "<td>".$row['Documento']."</td>";
                                echo "<td>".$row['FechaNacimiento']."</td>";
                                echo "<td>".$row['Domicilio']."</td>";
                                echo "<td>".$row['Email']."</td>";
                                echo "<td>".'<a href="#"> Modificar </a>'."</td></tr>";
                            }
                           
                            
                        ?>
                    </table>
                    <input type="button" onclick="location.href='operacion.html'" name="btn_atras" value="Atras" style='width:125px; height:40px'/>        
            </form>

        </div>
    </body>
</html>