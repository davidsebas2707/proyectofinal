<?php
session_start();
include("../conexion/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIO NO ENCONTRADO</title>
    <style>
        body {
            font-family: Cooper Black, sans-serif;
            background-image: url('./imagenes/stop.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center top -200px;
            margin: 0;
            padding: 0;
            text-align: center; /* Alinea el contenido al centro */
            font-size: 20px;
            color: black; /* Cambia el color del texto a negro */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $consulta = "SELECT * FROM usuarios WHERE username = '$username'";
        $resultado = mysqli_query($conn, $consulta);

        if (mysqli_num_rows($resultado) == 1) {
            $usuario = mysqli_fetch_assoc($resultado);
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['usuario'] = $username;
                header('Location: index.php');
            } else {
                echo "CONTRASEÑA INCORRECTA. <a href='login.php'>Volver</a>";
            }
        } else {
            echo "USUARIONO ENCONTRADO. <a href='login.php'>Volver</a>";
        }
    }
    ?>
</body>
</html>
