<?php
require("conexiondb.php");
require('fpdf/fpdf.php');

$idFactura= $_GET['idFactura'];
$conectar=new conexiondb();
$con=$conectar->conectar();
$con=$conectar->datos($idFactura);
///////////////////////////////////////////////////
//COMPROBANTE 
class PDF extends FPDF{
	function Header(){
	$this->SetFont('Arial','B',30);
	$this->Cell(80);
	$this->SetTextColor(40,119,221);
	$this->Cell(30,10,'OCOLCHONES',0,0,'C');
	$this->Ln(30);
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(50);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(100,10,'COMPROBANTE DE FACTURA CON FOLIO '.$con["idFactura"],0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
//FECHA Y LUGAR
$pdf->Cell(100);
$pdf->Cell(27.5,8,"LUGAR:",0,0,'R');
$pdf->Cell(20);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(27.5,8,"ZACATECAS, ZACATECAS",0,0,'R');
$pdf->Ln(5);
$pdf->Cell(100);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(27.5,8,"FECHA: ",0,0,'R');
$pdf->Cell(10);
$fecha=strftime("%c");
$pdf->SetTextColor(0,0,0);
$pdf->Cell(27.5,8,$fecha,0,0,'R');
//EMISOR
$pdf->Ln(10);
$pdf->Cell(8);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(27.5,8,"EMISOR: ",0,0,'C');
$pdf->Cell(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(27.5,8,"OCOLCHONES S.A. DE C.V. ",0,0,'C');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(27.5,8,"RFC: ",0,0,'C');
$pdf->Cell(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(27.5,8,"XAXX010101000",0,0,'C');
//RECEPTOR
$pdf->Ln(20);
$pdf->Cell(8);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(27.5,8,"RECEPTOR: ",0,0,'C');
$pdf->Cell(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,8,$con["nombreUnidad"],0,0,'C');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(27.5,8,"RFC: ",0,0,'C');
$pdf->Cell(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(27.5,8,"XAXX010101000",0,0,'C');
//FECHA DE EMISION
$pdf->Ln(20);
$pdf->Cell(18);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(27.5,8,"FECHA DE EMISION: ",0,0,'C');
$pdf->Cell(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,8,$con["fecha"],0,0,'C');
//descuento
if($con["tipoTransporte"]=="Barco"){
$pdf->Ln(20);
$pdf->Cell(5);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(45,8,"Aplica descuento de ".$con["descuento"]."%",0,0,'C');
}
//linea de datos
$pdf->Ln(20);
$pdf->Cell(5);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(45,8,"TRANSPORTE",0,0,'C');
$pdf->Cell(10);
$pdf->Cell(45,8,"NUMERO DE UNIDADES",0,0,'C');
$pdf->Cell(20);
$pdf->Cell(15,8,"PRECIO",0,0,'C');
$pdf->Cell(30);
$pdf->Cell(10,8,"IMPORTE",0,0,'C');
//DATOS
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(45,8,$con["tipoTransporte"],0,0,'C');
$pdf->Cell(10);
$pdf->Cell(45,8,$con["cantidadUnidades"],0,0,'C');
$pdf->Cell(20);
$pdf->Cell(15,8,$con["costoPorUnidad"],0,0,'C');
$pdf->Cell(30);
$pdf->Cell(10,8,"$".$con["importe"],0,0,'C');
//IVA
$pdf->Ln(15);
$pdf->Cell(142);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(15,8,"IVA",0,0,'C');
$pdf->Cell(10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,8,"$".$con["iva"],0,0,'C');
//TOTAL
$pdf->Ln(15);
$pdf->Cell(142);
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(40,119,221);
$pdf->Cell(15,8,"TOTAL",0,0,'C');
$pdf->Cell(10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,8,"$".$con["total"],0,0,'C');
//IMAGEN
$pdf->Image('img/codigo.PNG', 25, 220,50);

$pdf->Output("Factura".$con["idFactura"].".pdf","I");
?>