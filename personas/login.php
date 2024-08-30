<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #007bff; 
            background-image: url('./imagenes/gots.gif'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8); 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Iniciar Sesión</h2>
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <p class="mt-3"><a href="registro.php">Regístrate aquí</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>