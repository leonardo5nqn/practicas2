<html>
    <head>
        Listar Usuarios
    </head>

    <body>
        <div>
            <h2>Listar y Modificar USUARIOS</h2>
        </div>

        
        <!--Creo mi tabla-->
        <div>
            <?php 
                include "../model/Usuario.php";
                $resultado=  Usuario::mostrarUsuario();
            ?>
            <form action="..\controller\controllerUsuario.php" method="POST">
                <table aling="center" border="1px" >
                        <tr>
                            <th><h3>ID Usuario</h3></th>
                            <th><h3>ID Persona</h3></th>
                            <th><h3>ID Rol</h3></th>
                            <th><h3>Usuario</h3></th>
                            <th><h3>Contrase&ntilde;a</h3></th>
                            <th><h3>Huella</h3></th>
                        </tr>
                        <?php
                            while($row=mysqli_fetch_array($resultado)){
                                echo "<tr><td>".$row['id_usuario']."</td>";
                                echo "<td>".$row['id_persona']."</td>";
                                echo "<td>".$row['id_rol']."</td>";
                                echo "<td>".$row['usuario']."</td>";
                                echo "<td>".$row['contrasena']."</td>";
                                echo "<td>".$row['huella']."</td>";
                                echo "<td>".'<a href="#"> Modificar </a>'."</td></tr>";
                            }
                           
                            
                        ?>
                    </table>
                    <input type="button" onclick="location.href='operacion.html'" name="btn_atras" value="Atras" style='width:125px; height:40px'/>
            </form>
        </div>
    </body>
</html>