<?php
class validacion{
	function validar($transporte,$nombre,$cantidadUnidades,$costoUnidad,$descuento){
		$this->transporte=$transporte;
		$this->nombre=$nombre;
		$this->cantidadUnidades=$cantidadUnidades;
		$this->costoUnidad=$costoUnidad;
		$this->descuento=$descuento;
		if($this->transporte!="Barco" && $this->transporte!="Ferrocarril"){
			return false;
		}elseif (strlen($this->nombre)==0 || ctype_space($this->nombre)) {
			return false;
		}elseif (!is_numeric($this->cantidadUnidades) ) {
			return false;
		}elseif (!is_numeric($this->costoUnidad) ) {
			return false;
		}
		elseif (!is_numeric($this->descuento) ) {
			return false;
		}else{
			return true;
		}
	}
}
?>