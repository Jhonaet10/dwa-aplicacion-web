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
    <title>Gestión</title>
</head>
<body id="crearTarea">
    <h1>GESTIÓN</h1>
    <a href="index.php">Inicio</a>
    <h3>Crear Equipos</h3>

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
            <td>Nombre: </td>
            <td>
                <input type="text" name="nombre"required>
            </td>
        </tr>
        <tr>
            <td>Color del uniforme: </td>
            <td>
                <input type="text" name="color_uniforme"required>
            </td>
        </tr>
        <tr>
            <td>Técnico: </td>
            <td>
                <input type="text" name="tecnico"required>
            </td>
        </tr>
        <tr>
            <td>Sede: </td>
            <td>
                <input type="text" name="sede"required>
            </td>
        </tr>
        <tr>
            <td>Fecha de registro: </td>
            <td>
                <input type="date" name="fecha">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Guardar" target="_blank">
            </td>
        </tr>
        </table>
    </form>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $nombre = $_POST['nombre'];
        $color_uniforme = $_POST['color_uniforme'];
        $tecnico = $_POST['tecnico'];
        $sede = $_POST['sede'];
        $fecha_registro = $_POST['fecha'];

        $conn1 = mysqli_connect(SERVIDOR,USERNAME,'') or die(mysqli_error);
        
        $basedatos1 = mysqli_select_db($conn1,BASEDATOS) or die(mysqli_error); 

        $sqlcrear = "INSERT INTO EQUIPO (nombre, color_uniforme, tecnico, sede, fecha_registro) 
            VALUES('$nombre','$color_uniforme','$tecnico','$sede','$fecha_registro');";

        $res = mysqli_query($conn1, $sqlcrear);
        
        if($res == true)
        {
            $_SESSION['crear'] = "Equipo registrado exitosamente!!";
            header('location:'.URLSITIO);
        }
        else {
            $_SESSION['error_crear'] = "Error al registrar el equipo.";
            header('location:'.URLSITIO.'CrearEquipo.php');
        }        
    }
?>
