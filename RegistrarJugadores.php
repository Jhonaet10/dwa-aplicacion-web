
<?php
    include('Configuracion/Constantes.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Jugadores</title>
</head>
<body>
<p>
        <?php
            if(isset($_SESSION['error_crear']))
            {
                echo $_SESSION['error_crear'];
                unset($_SESSION['error_crear']);
            }
        ?>
    </p>
    
    <form action="" method="POST">
        <table>
        <tr>
            <td>Cédula: </td>
            <td>
                <input type="text" name="cedula" required>
            </td>
        </tr>
        <tr>
            <td>Nombre: </td>
            <td>
                <input type="text" name="nombre" required>
            </td>
        </tr>
        <tr>
            <td>Nacionalidad: </td>
            <td>
                <input type="text" name="nacionalidad" required>
            </td>
        </tr>
        <tr>
            <td>Posición: </td>
            <td>
                <input type="text" name="posicion" required>
            </td>
        </tr>
        <tr>
            <td>Número: </td>
            <td>
                <input type="text" name="numero" required>
            </td>
        </tr>
        <tr>
            <td>Fecha de nacimiento: </td>
            <td>
                <input type="date" name="fecha">
            </td>
        </tr>
        <tr>
            <td>Teléfono: </td>
            <td>
                <input type="text" name="telefono" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Guardar" target="_blank">
            </td>
        </tr>
        </table>
    </form>

    <div class="torneos">
    
    <a href="CrearTorneo.php">Crear torneo</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Eliminar torneo</th>
            <th>Agregar equipos</th>
        </tr>

        <?php
            $conn=mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error());
            $basedatos=mysqli_select_db($conn,BASEDATOS);

            $sql = "SELECT * FROM JUGADOR";
            $res = mysqli_query($conn, $sql);
            if($res == true)
            {
                //Se ejecutó la sentencia.
                $numFilas = mysqli_num_rows($res);
                if($numFilas > 0)
                {
                    while($fila = mysqli_fetch_assoc($res))
                    {
                        $nombre = $fila['nombre'];
                        $descripcion = $fila['descripcion'];

                        ?>

                        <tr>
                            <td> <?php echo $fila['id'] ?> </td>
                            <td> <?php echo $nombre ?> </td>
                            <td> <?php echo $descripcion ?> </td>
                            <td>
                                <a href="EliminarTorneo.php?id= <?php echo $fila['id']; ?> ">Eliminar</a>
                            </td>
                            <td>
                                <a href="CrearEquipo.php crear.php ">Agregar</a>
                            </td>
                            <td>
                                <a href="index.php">Ver</a>
                            </td>
                        </tr>
                        
                        <?php
                    }
                }
                else {
                    //No existen datos.
                    ?>

                    <tr>
                        <td>
                            Aún no se han creado torneos de fútbol.
                        </td>
                    </tr>

                    <?php

                }
            }
    
        ?>
    </table>
</div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $nacionalidad = $_POST['nacionalidad'];
        $posicion = $_POST['posicion'];
        $numero = $_POST['numero'];
        $fecha_nacimiento = $_POST['fecha'];
        $telefono = $_POST['telefono'];

        $conn1 = mysqli_connect(SERVIDOR,USERNAME,'') or die(mysqli_error);
        
        $basedatos1 = mysqli_select_db($conn1,BASEDATOS) or die(mysqli_error); 

        $sqlcrear = "INSERT INTO JUGADOR (cedula, nombre, nacionalidad, posicion, numero, fecha_nacimiento, telefono) 
            VALUES('$cedula','$nombre','$nacionalidad','$posicion','$numero','$fecha_nacimiento','$telefono');";

        $res = mysqli_query($conn1, $sqlcrear);
        
        if($res == true)
        {
            $_SESSION['crear'] = "Jugador registrado";
            header('location:'.URLSITIO);
        }
        else {
            $_SESSION['error_crear'] = "Error al registrar el jugador.";
            header('location:'.URLSITIO.'RegistrarJugador.php');
        }        
    }
?>