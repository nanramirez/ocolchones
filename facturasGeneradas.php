<?php
require ("conexiondb.php");
?>
<HTML>
	<head>
		<meta charset="utf-8" />
		<title>oColchones</title>
	</head>
	<body>
		<h1 align="center"><strong>OCOLCHONES</strong></h1>
		<nav align="center">
			<ul>
			<a href="index.html">Facturar</a>
			<br>
            <a href="facturasgeneradas.php">Facturas Generadas</a>
			</ul>
		</nav>
		<h1 align="center">Facturas Generadas</h1>
			<table border="1" align="center">
				<tr>
					<td><h3># Factura</h3></td>
					<td><h3>Fecha de facturación</h3></td>
					<td><h3>Tipo de transporte</h3></td>
					<td><h3>Nombre de la unidad</h3></td>
					<td><h3>Cantidad de unidades:</h3></td>
					<td><h3>Costo del día por unidad</h3></td>
					<td><h3>Importe</h3></td>
					<td><h3>IVA</h3></td>
					<td><h3>Total</h3></td>
					<td><h3>Generar</h3></td>
				</tr>
					<?php
					$conectar=new conexiondb();
					$con=$conectar->conectar();
					$con=$conectar->mostrar();
					?>
			</table>
	</body>
</HTML>