<?php
	class descuento{
		function descuento(){
			$importe=0.0;
			$importe2=0.0;
			$total=0.0;
		}

		function calcularImporte($cantidadUnidades,$costoUnidad,$descuento){
			$this->cantidadUnidades=$cantidadUnidades;
			$this->costoUnidad=$costoUnidad;
			$this->descuento=$descuento;
			//redondear en 20 las unidades
			$unidadesConDescuento=floor($this->cantidadUnidades/20);
			//sacar el numero de unidades con descuento
			$unidadesConDescuento=$unidadesConDescuento*20;
			//obtener el numero de unidades sin descuento
			$unidadesSinDescuento=$this->cantidadUnidades-$unidadesConDescuento;
			//obtener el total a pagar de las unidades sin descuento
			$importe=$unidadesSinDescuento*$this->costoUnidad;
			//sacar el porcentaje real que se va a pagar con descuento
			$des=(100-$this->descuento)/100;
			//sacar el costo real de las unidades con descuento
			$des=$this->costoUnidad*$des;
			//obtener el costo total de las unidades con descuento
			$importe2=$des*$unidadesConDescuento;
			//sumar importes
			$total=$importe+$importe2;
			return $total;
		}
	}
?>