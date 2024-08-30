<?php
include('../conexion/conexion.php');
require('fpdf/fpdf.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM personas WHERE id = $id";
    $resultado = mysqli_query($conn, $consulta);
    $columna = mysqli_fetch_array($resultado);
} else {
    echo "ID de elemento no válido";
    exit;
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'RECIBO DEL CLIENTE', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'DETALLES DEL CLIENTE', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'NOMBRE DEL CLIENTE: ' . $columna['usuario'], 0, 1);
$pdf->Cell(0, 10, 'NUMERO DE DOCUMENTO: ' . $columna['numero_documento'], 0, 1);
$pdf->Cell(0, 10, 'TELEFONO: ' . $columna['telefono'], 0, 1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'DETALLES DEL ESTACIONAMIENTO', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'TIPO DE VEHICULO: ' . $columna['tipo_vehiculo'], 0, 1);
$pdf->Cell(0, 10, 'NUMERO DE PLACA: ' . $columna['numero_placa'], 0, 1);
$pdf->Cell(0, 10, 'TIEMPO DE ESTACIONAMIENTO EN HORAS: ' . $columna['numero_horas'] . ' HORAS', 0, 1);
$pdf->Cell(0, 10, 'TIEMPO DE ESTACIONAMIENTO EN DIAS: ' . $columna['numero_dias'] . ' DIAS', 0, 1);
$pdf->Cell(0, 10, 'VALOR A PAGAR: ' . $columna['valor'] . ' PESOS', 0, 1);

$pdf->Output();
?>
