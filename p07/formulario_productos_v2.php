<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();

        var id = document.getElementById('id').value;
        var sku = document.getElementById('sku').value;
        var nombre = document.getElementById('nombre').value;
        var marca = document.getElementById('marca').value;
        var modelo = document.getElementById('modelo').value;
        var unidades = document.getElementById('unidades').value;
        var precio = document.getElementById('precio').value;
        var detalles = document.getElementById('detalles').value;
        var imagen = document.getElementById('imagen').value;

        // Validar SKU
        if (sku.length == 0) {
            alert("El SKU no puede quedar vacío");
            document.FormAgregarProducto.sku.focus();
            return;
        }

        // Validar NOMBRE
        if (nombre.length == 0) {
            alert('El NOMBRE no puede quedar vacío');
            document.FormAgregarProducto.nombre.focus();
            return;
        }

        // Validar MARCA
        if (marca.length == 0) {
            alert('La MARCA no puede quedar vacía');
            return;
        }

        // Validar MODELO
        if (modelo.length == 0) {
            alert("El MODELO no puede quedar vacío");
            document.FormAgregarProducto.modelo.focus();
            return;
        }

        // Validar UNIDADES
        if (unidades.length == 0) {
            alert("La CANTIDAD debe ser un valor entero mayor a 0");
            document.FormAgregarProducto.unidades.focus();
            return;
        }
        if (isNaN(parseInt(unidades))) {
            alert("La CANTIDAD debe ser un valor entero mayor a 0");
            document.FormAgregarProducto.unidades.focus();
            return;
        }
        if (unidades < 1) {
            alert("La CANTIDAD debe ser un valor entero mayor a 0");
            document.FormAgregarProducto.unidades.focus();
            return;
        }
        if (unidades % 1 !== 0) {
            alert("La CANTIDAD debe ser un valor entero mayor a 0");
            document.FormAgregarProducto.unidades.focus();
            return;
        }

        // Validar PRECIO
        if (precio.length == 0) {
            alert("El PRECIO debe ser un valor mayor a 0");
            document.FormAgregarProducto.precio.focus();
            return;
        }
        if (isNaN(parseInt(unidades))) {
            alert("El PRECIO debe ser un valor mayor a 0");
            document.FormAgregarProducto.precio.focus();
            return;
        }
        if (precio < 99.99) {
            alert("El PRECIO debe ser un valor mayor a 0");
            document.FormAgregarProducto.precio.focus();
            return;
        }

        // Validar DETALLES
        if (detalles.length == 0) {
            document.getElementById('detalles').value = "";
        }

        // Validar IMAGEN
        if (imagen.length == 0) {
            document.getElementById('imagen').value = "img/cat.png"
        }

        //el formulario se envia
        this.submit();
    }
</script>

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
    <form name="FormAgregarProducto" action="set_producto.php" method="post" id="formulario">
        <fieldset>
            <legend>Agregar producto</legend>
            <fieldset>
                <legend>N&uacute;mero de parte y Nombre del producto</legend>
                <ul>
                    <li><label for="formID">ID</label><input type="text" name="id" id="id" maxlength="20" value="<?= $_GET['id'] ?>"></li>
                    <li><label for="formSKU">SKU</label><input type="text" name="sku" id="sku" placeholder="DCPT700W" maxlength="25" autofocus value="<?= $_GET['sku'] ?>"></li>
                    <li><label for="formNombre">Nombre</label><input type="text" name="nombre" id="nombre" size="50" placeholder="Multifuncional Brother DCP-T700W" maxlength="100" value="<?= $_GET['nombre'] ?>"></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Marca y Modelo del producto</legend>
                <ul>
                    <li><label for="formMarca">Marca</label><select name="marca" id="marca">
                            <option value="<?= $_GET['marca'] ?>" selected></option>
                            <option value="Brother">Brother</option>
                            <option value="Canon">Canon</option>
                            <option value="Epson">Epson</option>
                            <option value="HP">HP</option>
                        </select></li>
                    <li><label for="formModelo">Modelo</label><input type="text" name="modelo" id="modelo" placeholder="DCP-T700W" maxlength="25" value="<?= $_GET['modelo'] ?>"></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Cantidad y Precio del producto</legend>
                <ul>
                    <li><label for="formUnidades">Cantidad</label><input type="text" name="unidades" id="unidades" value="<?= $_GET['unidades'] ?>"></li>
                    <li><label for="formPrecio">Precio</label><input type="text" name="precio" id="precio" value="<?= $_GET['precio'] ?>"></li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Detalles y ruta de la Imagen del producto</legend>
                <ul>
                    <li><label for="formDetalles">Detalles</label><input type="text" name="detalles" id="detalles" size="50" placeholder="Color, Inyecci&oacute;n, Inal&aacute;mbrico, Print/Scan/Copy" maxlength="250" value="<?= $_GET['detalles'] ?>"></li>
                    <li><label for="formImagen">Imagen</label><input type="text" name="imagen" id="imagen" placeholder="img/imagen.png" maxlength="100" value="<?= $_GET['imagen'] ?>"></li>
                </ul>
            </fieldset>
            <input type="submit" value="Guardar">
            <input type="reset">
        </fieldset>
    </form>
</body>

</html>