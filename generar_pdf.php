<?php
require('fpdf186/fpdf.php');
require_once "conexion.php";

$id = $_GET['id'];  // o $_POST si lo enviás por form
$clasificacion = $_GET['clasificacion']; // importante validar

$sql = "SELECT * FROM pieza INNER JOIN $clasificacion ON pieza.id = $clasificacion.pieza_id WHERE pieza.id = $id";
$result = mysqli_query($conex, $sql);
$fila = mysqli_fetch_assoc($result);

// Crear el PDF
$pdf = new FPDF();
$pdf->AddPage();

// Fuente título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Ficha de Pieza - Inventario Nº ' . $fila['numinventario'], 0, 1, 'C');
$pdf->Ln(10);

// Datos generales
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Especie:', 0, 0);
$pdf->Cell(100, 10, $fila['especie'], 0, 1);

$pdf->Cell(50, 10, 'Clasificación:', 0, 0);
$pdf->Cell(100, 10, $fila['clasificacion'], 0, 1);

$pdf->Cell(50, 10, 'Estado de conservación:', 0, 0);
$pdf->Cell(100, 10, $fila['estadoconservacion'], 0, 1);

$pdf->Cell(50, 10, 'Fecha de ingreso:', 0, 0);
$pdf->Cell(100, 10, $fila['fecha_ingreso'], 0, 1);

// Clasificación biológica
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Clasificación biológica:', 0, 1);

$pdf->SetFont('Arial', '', 12);
$campos = ['reino', 'clase', 'orden', 'familia', 'genero', 'especie', 'phylum', 'division', 'distribucion'];

foreach ($campos as $campo) {
    if (isset($fila[$campo])) {
        $pdf->Cell(50, 10, ucfirst($campo) . ':', 0, 0);
        $pdf->Cell(100, 10, $fila[$campo], 0, 1);
    }
}

// Mostrar imagen si existe
if (!empty($fila['imagen']) && file_exists($fila['imagen'])) {
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Imagen de la pieza:', 0, 1);
    $pdf->Image($fila['imagen'], 10, $pdf->GetY(), 90); // ajuste de tamaño
}

$pdf->Output('I', 'pieza_' . $id . '.pdf');
?>