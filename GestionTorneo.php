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
    <title>Gestión de torneos</title>
</head>
<body id="gestion">

    <h1>GESTIÓN DE TORNEOS</h1>
    <a href="index.php">Inicio</a>
    <h3>Gestión de torneos de fútbol</h3>

    <p>
        <?php
            if(isset($_SESSION['crear']))
            {
                echo $_SESSION['crear'];
                unset ($_SESSION['crear']);
            }

            if(isset($_SESSION['eliminar']))
            {
                echo $_SESSION['eliminar'];
                unset ($_SESSION['eliminar']);
            }

            if(isset($_SESSION['error_eliminar']))
            {
                echo $_SESSION['error_eliminar'];
                unset ($_SESSION['error_eliminar']);
            }

            if(isset($_SESSION['error_actualizar']))
            {
                echo $_SESSION['error_actualizar'];
                unset ($_SESSION['error_actualizar']);
            }
        ?>
    </p>

    <div class="torneos">
    
        <a href="CrearTorneo.php">Crear torneo</a>
        <table>
            <tr>
                <th>Ord.</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Eliminar torneo</th>
                <th>Agregar equipos</th>
            </tr>

            <?php
                $conn=mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error());
                $basedatos=mysqli_select_db($conn,BASEDATOS);

                $sql = "SELECT * FROM TORNEOS";
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