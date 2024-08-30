<?php
include("../conexion/conexion.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$consulta = "SELECT * FROM personas";
$resultado = mysqli_query($conn, $consulta);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-image: url('./imagenes/au.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .alert-primary {
            background-color: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .table th {
            background-color: #dc3545;
            color: #fff;
            border-color: #dc3545;
            vertical-align: middle; 
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #ffffff;
        }
    
        .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="alert alert-primary text-center" role="alert">
            <h3>MENU DE PERSONAS</h3>
            <a class="btn btn-success" href="./formulario.php">AÑADIR CLIENTE</a>
            <a class="btn btn-danger" href="./cerrar_sesion.php">CERRAR SESION</a>
        </div>
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th style="vertical-align: middle;">NOMBRE COMPLETO</th> 
                    <th style="vertical-align: middle;">TIPO DE VEHICULO</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $ndatos = 0;
                while ($columna = mysqli_fetch_array($resultado)) {
                    $ndatos++;
                ?>
                <tr>
                    <td><?php echo $ndatos; ?></td>
                    <td style="vertical-align: middle;"><?php echo $columna['usuario']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $columna['tipo_vehiculo']; ?></td>
                    <td>
                    <a href="./listar_elemento.php?id=<?php echo $columna['id']; ?>" class="btn btn-outline-primary">IMPRIMIR RECIBITO</a>
                        <a href="./procesardatos.php?btnEnviar=ELIMINAR&id=<?php echo $columna['id']; ?>" class="btn btn-outline-danger">ELIMINAR</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>