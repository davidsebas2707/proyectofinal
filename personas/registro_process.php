<?php
include("../conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $consulta = "INSERT INTO usuarios (username, password) VALUES ('$username', '$hashedPassword')";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        $mensaje = "REGISTRO EXITOSO. $username <a href='login.php'>INICIA SESIÓN</a>";
        $color = "green";
    } else {
        $mensaje = "ERROR EN EL REGISTRO <a href='registro.php'>VOLVER</a>";
        $color = "red";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página</title>
    <style>
        body {
            background-image: url('./imagenes/pista.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: #333;
        }

        p {
            color: <?php echo $color; ?>;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CORRECTO</h1>
        <p><?php echo $mensaje; ?></p>
    </div>
</body>
</html>
