<?php
require ("conexiondb.php");
require ("descuento.php");
require ("validacion.php");

$transporte=$_POST["transporte"];
$nombre=$_POST["nombre"];
$cantidadUnidades=$_POST["cantidadUnidades"];
$costoUnidad=$_POST["costoUnidad"];
$descuento=$_POST["descuento"];
$fecha=strftime("%c");

$validacion=new validacion();
$valido=$validacion->validar($transporte,$nombre,$cantidadUnidades,$costoUnidad,$descuento);
if($valido){
		if($transporte=="Barco"){
			$des=new descuento();
			$importe=$des->calcularImporte($cantidadUnidades,$costoUnidad,$descuento);
			$iva=$importe*.16;
			$total=$importe+$iva;
		}else{
			$descuento=0.0;
			$importe=$cantidadUnidades*$costoUnidad;
			$iva=$importe*.16;
			$total=$importe+$iva;
		}
	$conectar=new conexiondb();
	$con=$conectar->conectar();
	$con=$conectar->insertar($transporte,$cantidadUnidades,$nombre,$costoUnidad,$descuento,$importe,$iva,$total,$fecha);
}else{
	echo "Los datos son invalidos";
}







?>