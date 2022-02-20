<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<?php
if (empty($_POST['sku'])) {
    echo '<script type="text/javascript">alert("El SKU no puede quedar vacío");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['nombre'])) {
    echo '<script type="text/javascript">alert("El NOMBRE no puede quedar vacío");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['marca'])) {
    echo '<script type="text/javascript">alert("La MARCA no puede quedar vacía");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['modelo'])) {
    echo '<script type="text/javascript">alert("El MODELO no puede quedar vacío");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['unidades'])) {
    echo '<script type="text/javascript">alert("La CANTIDAD debe ser un valor entero mayor a 0");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (!ctype_digit($_POST['unidades'])) {
    echo '<script type="text/javascript">alert("La CANTIDAD debe ser un valor entero mayor a 0");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['precio'])) {
    echo '<script type="text/javascript">alert("El PRECIO debe ser un valor mayor a 0");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (!is_numeric($_POST['precio'])) {
    echo '<script type="text/javascript">alert("El PRECIO debe ser un valor mayor a 0");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif ($_POST['precio'] < 0) {
    echo '<script type="text/javascript">alert("El PRECIO debe ser un valor mayor a 0");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['detalles'])) {
    echo '<script type="text/javascript">alert("El valor DETALLES no puede quedar vacío");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} elseif (empty($_POST['imagen'])) {
    echo '<script type="text/javascript">alert("El valor IMAGEN no puede quedar vacío");</script>';
    echo '<script type="text/javascript">window.history.back(-1)</script>';
} else {
    @$link = new mysqli('localhost', 'root', 'localhost', 'marketzone');

    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error . '<br/>');
    }

    $sql = "INSERT INTO productos VALUES (null, '{$_POST['sku']}', '{$_POST['nombre']}', '{$_POST['marca']}', '{$_POST['modelo']}', {$_POST['precio']}, '{$_POST['detalles']}', {$_POST['unidades']}, '{$_POST['imagen']}', 0)";
    if ($link->query($sql)) {
        $id = $link->insert_id;
    }

    $link->close();
}
?>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Resumen de Producto Ingresado</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='screen' charset='utf-8' />
</head>

<body>
    <nav>
        <ul>
            <li><a href="formulario_productos.php">Agregar Productos</a></li>
            <li><a href="get_productos_vigentes.php">Consultar Productos Vigentes</a></li>
        </ul>
    </nav>
    <?php if (isset($id)) : ?>
        <h1>Producto Registrado</h1>
        <fieldset>
            <legend>Resumen de producto</legend>
            <fieldset>
                <legend>N&uacute;mero de parte y Nombre del producto</legend>
                <ul>
                    <li><strong>ID:</strong><?php global $id;
                                            echo $id ?></li>
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