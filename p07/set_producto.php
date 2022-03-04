<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<?php
@$link = new mysqli('localhost', 'root', 'localhost', 'marketzone');

if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error . '<br/>');
}

$sql = "UPDATE productos SET sku = '{$_POST['sku']}', nombre = '{$_POST['nombre']}', marca = '{$_POST['marca']}', modelo = '{$_POST['modelo']}', precio = {$_POST['precio']}, detalles = '{$_POST['detalles']}', unidades = {$_POST['unidades']}, imagen = '{$_POST['imagen']}' WHERE id = {$_POST['id']}";

if (!mysqli_query($link, $sql)) {
    echo 'No se pudo completar el registro';
}

mysqli_close($link);
?>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Resumen de Producto Ingresado</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='screen' charset='utf-8' />
</head>

<body>
    <?php if (isset($sql)) : ?>
        <h1>Producto Guardado</h1>
        <fieldset>
            <legend>Resumen de producto</legend>
            <fieldset>
                <legend>N&uacute;mero de parte y Nombre del producto</legend>
                <ul>
                    <li><strong>ID:</strong><?php echo $_POST['id'] ?></li>
                    <li><strong>SKU:</strong><?php echo $_POST['sku'] ?></li>
                    <li><strong>Nombre:</strong><?php echo $_POST['nombre'] ?></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Marca y Modelo del producto</legend>
                <ul>
                    <li><strong>Marca:</strong><?php echo $_POST['marca'] ?></li>
                    <li><strong>Modelo:</strong><?php echo $_POST['modelo'] ?></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Cantidad y Precio del producto</legend>
                <ul>
                    <li><strong>Cantidad:</strong><?php echo $_POST['unidades'] ?></li>
                    <li><strong>Precio</strong><?php echo $_POST['precio'] ?></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Detalles e Imagen del producto</legend>
                <ul>
                    <li><strong>Detalles:</strong><?php echo $_POST['detalles'] ?></li>
                    <li><strong>Imagen:</strong><?php echo $_POST['imagen']; ?></li>
                </ul>
            </fieldset>
        </fieldset>
    <?php else : ?>
        <script type="text/javascript">
            alert("El Producto no pudo ser ingresado =(");
        </script>';
    <?php endif; ?>
</body>

</html>