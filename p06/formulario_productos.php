<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Agregar Productos</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='screen' charset='utf-8' />
</head>

<body>
    <nav>
        <ul>
            <li><a href="get_productos_vigentes.php">Consultar Productos Vigentes</a></li>
        </ul>
    </nav>
    <form action="set_producto_v2.php" method="post">
        <fieldset>
            <legend>Agregar producto</legend>
            <fieldset>
                <legend>N&uacute;mero de parte y Nombre del producto</legend>
                <ul>
                    <li><label for="formSKU">SKU</label><input type="text" name="sku" placeholder="DCPT700W" maxlength="25" autofocus></li>
                    <li><label for="formNombre">Nombre</label><input type="text" name="nombre" size="50" placeholder="Multifuncional Brother DCP-T700W" maxlength="100"></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Marca y Modelo del producto</legend>
                <ul>
                    <li><label for="formMarca">Marca</label><input type="text" name="marca" placeholder="Brother" maxlength="25"></li>
                    <li><label for="formModelo">Modelo</label><input type="text" name="modelo" placeholder="DCP-T700W" maxlength="25"></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Cantidad y Precio del producto</legend>
                <ul>
                    <li><label for="formUnidades">Cantidad</label><input type="text" name="unidades"></li>
                    <li><label for="formPrecio">Precio</label><input type="text" name="precio"></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Detalles y ruta de la Imagen del producto</legend>
                <ul>
                    <li><label for="formDetalles">Detalles</label><input type="text" name="detalles" size="50" placeholder="Color, Inyecci&oacute;n, Inal&aacute;mbrico, Print/Scan/Copy" maxlength="250"></li>
                    <li><label for="formImagen">Imagen</label><input type="text" name="imagen" placeholder="img/imagen.png" maxlength="100"></li>
                </ul>
            </fieldset>
            <input type="submit" value="Guardar">
            <input type="reset">
        </fieldset>
    </form>
</body>

</html>