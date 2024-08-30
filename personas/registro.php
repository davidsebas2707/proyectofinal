<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: Cooper Black, sans-serif;
            background-color: #000;
            color: #007bff; 
            background-image: url('./imagenes/park.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .custom-container {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8); 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .custom-form {
            margin-top: 20px; 
        }

        .btn-primary {
            background-color: #000;
            border-color: #FFFF00;
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <h2>Registrarse</h2>
        <form action="registro_process.php" method="POST" class="custom-form">
            <table>
                <tr>
                    <td><label for="username">Usuario:</label></td>
                    <td><input type="text" id="username" name="username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña:</label></td>
                    <td><input type="password" id="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Registrarse</button></td>
                </tr>
            </table>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
