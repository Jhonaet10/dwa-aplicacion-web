
<?php
    include('Configuracion/Constantes.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Tareas.css">
    <title>Sistema JETC</title>
</head>
<body id="principal">
    <h1>GESTIÓN</h1>
    <?php
    if(isset($_SESSION['eliminar_tarea']))
            {
                echo $_SESSION['eliminar_tarea'];
                unset ($_SESSION['eliminar_tarea']);
            }

            if(isset($_SESSION['error_eliminar_tarea']))
            {
                echo $_SESSION['error_eliminar_tarea'];
                unset ($_SESSION['error_eliminar_tarea']);
            }
    ?>
    <!-- Menú -->
    <div class="menu">
        <a href="Principal.html">Home</a>
        <a href="#">Registrar Arbitros</a>
        <a href="Calendario.php">Calendario</a>
    </div>
    <!-- Fin Menú -->

    <!-- Lista de Torneos -->
    <p>
        <?php
            if(isset($_SESSION['crear']))
            {
                echo $_SESSION['crear'];
                unset($_SESSION['crear']);
            }
        ?>
    </p>

    <a href="CrearEquipo.php">Agregar Equipo</a>

    <div class="equipos">
        <table>
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Color del uniforme</th>
                <th>Tecnico</th>
                <th>Sede</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </tr>
            
            <?php
                $conn=mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error());
                $basedatos=mysqli_select_db($conn,BASEDATOS);

                $sql = "SELECT * FROM EQUIPO";
                $res = mysqli_query($conn, $sql);

                if($res == true)
                {
                    $numFilas = mysqli_num_rows($res);
                    if($numFilas > 0)
                    {
                        while($fila = mysqli_fetch_assoc($res))
                        {
                            ?>
                                <tr>
                                    <td> <?php echo $fila['numero']; ?> </td>
                                    <td> <?php echo $fila['nombre']; ?> </td>
                                    <td> <?php echo $fila['color_uniforme']; ?> </td>
                                    <td> <?php echo $fila['tecnico']; ?> </td>
                                    <td> <?php echo $fila['sede']; ?> </td>
                                    <td> <?php echo $fila['fecha_registro']; ?> </td>
                                    <td>
                                        <a href="EliminarEquipo.php">Eliminar</a>
                                        <a href="RegistrarJugadores.php">Registrar jugadores</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else {
                        ?>
                            <tr>
                                <td colspan="5">Aún no se ha registrado ningún equipo.</td>
                            </tr>
                        <?php
                    }
                }  
            ?>     
        </table>
    </div>
</body>
</html>