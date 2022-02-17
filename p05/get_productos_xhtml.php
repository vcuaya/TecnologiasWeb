<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
if (isset($_GET['tope']))
	$tope = $_GET['tope'];

if (is_numeric($tope)) {
	if (!empty($tope)) {
		/** SE CREA EL OBJETO DE CONEXION */
		@$conexion = new mysqli('localhost', 'root', 'localhost', 'marketzone');

		/** comprobar la conexión */
		if ($conexion->connect_errno) {
			die('Falló la conexión: ' . $conexion->connect_error . '<br/>');
			/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}

		$sql = "SELECT * FROM productos WHERE unidades <= '{$tope}'";

		$result = $conexion->query($sql);

		$conexion->close();
	}
}
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Producto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>
	<h3>PRODUCTO</h3>

	<?php if (isset($result)) : ?>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">SKU</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($result as $producto) : ?>
					<?php
					echo '<tr>';
					echo '<th scope="row">' . $producto['id'] . '</th>';
					echo '<td>' . $producto['sku'] . '</td>';
					echo '<td>' . $producto['nombre'] . '</td>';
					echo '<td>' . $producto['marca'] . '</td>';
					echo '<td>' . $producto['modelo'] . '</td>';
					echo '<td>' . $producto['precio'] . '</td>';
					echo '<td>' . $producto['unidades'] . '</td>';
					echo '<td>' . $producto['detalles'] . '</td>';
					echo '<td><img src="' . $producto['imagen'] . '"' . 'alt="Producto" style="width: 200px; height: auto;"/></td>';
					echo '</tr>';
					?>
				<?php endforeach; ?>
			</tbody>
		</table>

	<?php else : ?>

		<script type="text/javascript">
			alert('No hay productos que coincidan con su criterio de busqueda');
		</script>

	<?php endif; ?>
</body>

</html>