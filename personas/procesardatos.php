<?php
include('../conexion/conexion.php');

if (isset($_POST['usuario'])) $requestData['usuario'] = $_POST['usuario'];
if (isset($_POST['tipo_vehiculo'])) $requestData['tipo_vehiculo'] = $_POST['tipo_vehiculo'];
if (isset($_POST['telefono'])) $requestData['telefono'] = $_POST['telefono'];
if (isset($_POST['tiempo'])) $requestData['tiempo'] = $_POST['tiempo'];
if (isset($_POST['numero_documento'])) $requestData['numero_documento'] = $_POST['numero_documento'];
if (isset($_POST['numero_placa'])) $requestData['numero_placa'] = $_POST['numero_placa'];
if (isset($_POST['numero_horas'])) $requestData['numero_horas'] = $_POST['numero_horas'];
if (isset($_POST['numero_dias'])) $requestData['numero_dias'] = $_POST['numero_dias'];
$accion = $_REQUEST['btnEnviar'];

switch ($accion) {
    case 'GUARDAR':
        store($requestData, $conn);
        break;
    case 'ELIMINAR':
        $id = $_REQUEST['id'];
        destroy($id, $conn);
        break;
}

function store($requestData, $conn) {
    $usuario = $requestData['usuario'];
    $tipo_vehiculo = $requestData['tipo_vehiculo'];
    $telefono = $requestData['telefono'];
    $tiempo = $requestData['tiempo'];
    $numero_documento = $requestData['numero_documento'];
    $numero_placa = $requestData['numero_placa'];
    $numero_horas = $requestData['numero_horas'];
    $numero_dias = $requestData['numero_dias'];

    if ($tiempo === 'HORA') {
        $valorEnPesos = $numero_horas * 1000;
    } elseif ($tiempo === 'DIA') {
        $valorEnPesos = $numero_dias * 25000;
    }

    $sql = "INSERT INTO personas(usuario, tipo_vehiculo, telefono, tiempo, numero_documento, valor, numero_placa, numero_horas,numero_dias)
            VALUES ('$usuario', '$tipo_vehiculo', '$telefono', '$tiempo', '$numero_documento', '$valorEnPesos', '$numero_placa', '$numero_horas','$numero_dias')";

    executeQuery($sql, $conn);

}

function destroy($id, $conn) {
    $sql = "DELETE FROM personas WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header('location: ./index.php');
    } else {
        echo "Error " . $sql . "<br>" . mysqli_error($conn);
    }
}

function executeQuery($sql, $conn) {
    if (mysqli_query($conn, $sql)) {
        header('Location: ./index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
