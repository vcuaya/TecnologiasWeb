<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
if (isset($_GET['tope']))
	$tope = $_GET['tope'];

if (is_numeric($tope)) {
	if (!empty($tope)) {
		@$conexion = new mysqli('localhost', 'root', 'localhost', 'marketzone');

		if ($conexion->connect_errno) {
			die('Falló la conexión: ' . $conexion->connect_error . '<br/>');
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
	<script type="text/javascript">
		function show() {
			var rowId = event.target.parentNode.parentNode.id;
			var data = document.getElementById(rowId).querySelectorAll(".datos");
			var sku = data[0].innerHTML;
			var nombre = data[1].innerHTML;
			var marca = data[2].innerHTML;
			var modelo = data[3].innerHTML;
			var precio = data[4].innerHTML;
			var unidades = data[5].innerHTML;
			var detalles = data[6].innerHTML;
			var imagen = data[7].getAttribute("src");
			console.log(imagen);
			send2form(rowId, sku, nombre, marca, modelo, precio, unidades, detalles, imagen);
		}

		function send2form(id, sku, nombre, marca, modelo, precio, unidades, detalles, imagen) {
			var urlForm = "http://localhost/practicas/p07/formulario_productos_v2.php";
			var Id = "id=" + id;
			var Sku = "sku=" + sku;
			var Nombre = "nombre=" + nombre;
			var Marca = "marca=" + marca;
			var Modelo = "modelo=" + modelo;
			var Precio = "precio=" + precio;
			var Unidades = "unidades=" + unidades;
			var Detalles = "detalles=" + detalles;
			var Imagen = "imagen=" + imagen;
			window.open(urlForm + "?" + Id + "&" + Sku + "&" + Nombre + "&" + Marca + "&" + Modelo + "&" + Precio + "&" + Unidades + "&" + Detalles + "&" + Imagen);
		}
	</script>
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
					<th scope="col">Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($result as $producto) : ?>
					<?php
					echo '<tr id="' . $producto['id'] . '">';
					echo '<th scope="row">' . $producto['id'] . '</th>';
					echo '<td class="datos">' . $producto['sku'] . '</td>';
					echo '<td class="datos">' . $producto['nombre'] . '</td>';
					echo '<td class="datos">' . $producto['marca'] . '</td>';
					echo '<td class="datos">' . $producto['modelo'] . '</td>';
					echo '<td class="datos">' . $producto['precio'] . '</td>';
					echo '<td class="datos">' . $producto['unidades'] . '</td>';
					echo '<td class="datos">' . $producto['detalles'] . '</td>';
					echo '<td><img class="datos" src="' . $producto['imagen'] . '"' . 'alt="Producto" style="width: 200px; height: auto;"/></td>';
					echo '<td><input type="button" value="Editar" onclick="show()" /></td>';
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