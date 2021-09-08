
<?php

    include('Configuracion/Constantes.php');

    if(isset($_GET['numero']))
    {
        //Eliminar el equipo de la Base de Datos.
        $numero = $_GET['numero'];
        $conn = mysqli_connect(SERVIDOR,USERNAME,'','') or die(mysqli_error());
        $basedatos = mysqli_select_db($conn, BASEDATOS);

        $sql = "DELETE FROM EQUIPO WHERE numero = $numero;";
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            //Se eliminó el registro.
            $_SESSION['eliminar'] = "Equipo eliminado exitosamente!!";
            header('location:'.URLSITIO.'index.php');    
        }
        else {
            //Error al eliminar el registro.
            $_SESSION['error_eliminar'] = "Ocurrió un problema al eliminar el equipo.";
            header('location:'.URLSITIO.'index.php');
        }
    }
    else {
        //Redirecciona a la lista.
        header('location:'.URLSITIO.'index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar equipo</title>
</head>
<body>
    
</body>
</html>