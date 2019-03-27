<?php
require ("configuracion.php");

class conexiondb{

	function conexiondb(){
		$conexion="";
		$db="";
		$query="";
		$insertarQuery="";
	}

	function conectar(){
		$this->conexion=mysql_connect(host,usuario,contrasena);
		if ($this->conexion==0) {
			echo "No hay conexion";
		}
		$this->db=mysql_select_db("ocolchones",$this->conexion);
	}

	function insertar($transporte,$cantidadUnidades,$nombre,$costoUnidad,$descuento,$importe,$iva,$total,$fecha){
		$query="INSERT INTO facturas (tipoTransporte, cantidadUnidades, nombreUnidad, costoPorUnidad, descuento, importe, iva, total,fecha)
		VALUES ('".$this->transporte=$transporte."','"
			.$this->cantidadUnidades=$cantidadUnidades."','"
			.$this->nombre=$nombre."','"
			.$this->costoUnidad=$costoUnidad."','"
			.$this->descuento=$descuento."','"
			.$this->importe=$importe."','"
			.$this->iva=$iva."','"
			.$this->total=$total."','"
			.$this->fecha=$fecha."');";
		$insertarQuery=mysql_query($query);
		
		if($insertarQuery){
			echo "Generada";
		}else{
			echo mysql_error();
			echo "nada";
		}
	}

	function mostrar(){
		$buscar="SELECT * FROM facturas;";
		$buscarQuery=mysql_query($buscar);
		while($resultado=mysql_fetch_array($buscarQuery)){
			echo "<tr>";
			echo '<td>'.$resultado["idFactura"]."</td>";
			echo '<td>'.$resultado["fecha"]."</td>";
			echo '<td>'.$resultado["tipoTransporte"]."</td>";
			echo '<td>'.$resultado["nombreUnidad"]."</td>";
			echo '<td>'.$resultado["cantidadUnidades"]."</td>";
			echo '<td>'.$resultado["costoPorUnidad"]."</td>";
			echo '<td>$'.$resultado["importe"]."</td>";
			echo '<td>$'.$resultado["iva"]."</td>";
			echo '<td>$'.$resultado["total"]."</td>";
			echo '<td><button onclick="location=\'generarComprobante.php?idFactura='.$resultado['idFactura'].'\'">Generar</button></td>';
			echo "</tr>";
		}
	}

	function datos($idFactura){
		$this->idFactura=$idFactura;
		$buscar="SELECT * FROM facturas WHERE idFactura='".$this->idFactura."';";
		$buscarQuery=mysql_query($buscar);
		while ( $resultado=mysql_fetch_array($buscarQuery)) {
			return $resultado;
		}
		return $resultado;
	}
}
?>