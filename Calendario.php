
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
    <title>Gestión tareas</title>
</head>
<body id="crearTarea">
    <form action="" method="POST">
        <table>
            <tr>
                <h1>Partido</h1>
                <td>
                    <select name="equipo" id="">
                        <?php
                            $conn = mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error);

                            $basedatos = mysqli_select_db($conn,BASEDATOS) or die(mysqli_error); 

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
                                            <option value="<?php echo $fila['numero']; ?>"> <?php echo $fila['nombre']; ?> </option>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                        <option value="0">Ninguna</option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </td>
                <td>
                <h1>VS</h1>
                        </td>

                <td>
                    <select name="equipo" id="">
                        <?php
                            $conn = mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error);

                            $basedatos = mysqli_select_db($conn,BASEDATOS) or die(mysqli_error); 

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
                                            <option value="<?php echo $fila['numero']; ?>"> <?php echo $fila['nombre']; ?> </option>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                        <option value="0">Ninguna</option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <td>
                <h1>Arbitro</h1>
                <td>
                <select name="arbitro" id="">
                        <?php
                            $conn = mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error);

                            $basedatos = mysqli_select_db($conn,BASEDATOS) or die(mysqli_error); 

                            $sql = "SELECT * FROM ARBITRO";

                            $res = mysqli_query($conn, $sql);
                            if($res == true)
                            {
                                $numFilas = mysqli_num_rows($res);
                                if($numFilas > 0)
                                {
                                    while($fila = mysqli_fetch_assoc($res))
                                    {
                                        ?>
                                            <option value="<?php echo $fila['numero']; ?>"> <?php echo $fila['nombre']; ?> </option>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                        <option value="0">Ninguna</option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </td>
                </td>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Guardar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
