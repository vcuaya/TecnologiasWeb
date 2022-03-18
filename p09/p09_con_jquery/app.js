var baseJSON = {
    "marca": "NA",
    "modelo": "XX-000",
    "precio": 0.0,
    "detalles": "NA",
    "unidades": 1,
    "imagen": "img/default.png"
};

function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
}

$(document).ready(function () {
    let edit = false;
    listarProductos();
    $('#search').keyup(function (e) {
        let search = $('#search').val();
        $.ajax({
            url: './backend/product-search.php',
            type: 'GET',
            data: {
                search
            },
            success: function (response) {
                let productos = JSON.parse(response);
                if (Object.keys(productos).length > 0) {
                    let template = '';
                    let template_bar = '';
                    productos.forEach(producto => {

                        let descripcion = '';
                        descripcion += '<li>marca: ' + producto.marca + '</li>';
                        descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                        descripcion += '<li>precio: ' + producto.precio + '</li>';
                        descripcion += '<li>detalles: ' + producto.detalles + '</li>';
                        descripcion += '<li>unidades: ' + producto.unidades + '</li>';

                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                        template_bar += `
                        <li>${producto.nombre}</il>
                    `;
                    });
                    document.getElementById("product-result").className = "card my-4 d-block";
                    $('#container').html(template_bar);
                    $('#products').html(template);
                }
            }
        })
    })

    $('#product-form').submit(function (e) {
        const producto = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#productoId').val(),
        };
        let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        e.preventDefault();
        let nombre = $('#name').val();
        var descripcion = JSON.parse($('#description').val());
        var alerta = "";

        // Validar NOMBRE
        if (nombre.length == 0) {
            alerta += '\nEl NOMBRE no puede quedar vacío\n';
        }
        if (nombre.length > 100) {
            alerta += '\nEl NOMBRE no puede ser mayor a 100 caracteres.\n';
        }

        // Validar MARCA
        if (descripcion['marca'].length == 0) {
            alerta += '\nLa MARCA no puede quedar vacía\n';
        }

        // Validar MODELO
        if (descripcion['modelo'].length == 0) {
            alerta += '\nEl MODELO no puede quedar vacío\n';
        }
        if (descripcion['modelo'].length > 25) {
            alerta += '\nEl MODELO no puede ser mayor a 25 caracteres.\n';
        }

        // Validar UNIDADES
        if (descripcion['unidades'].length == 0) {
            alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
        }
        if (isNaN(parseInt(descripcion['unidades']))) {
            alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
        }
        if (descripcion['unidades'] < 1) {
            alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
        }
        if (descripcion['unidades'] % 1 !== 0) {
            alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
        }

        // Validar PRECIO
        if (descripcion['precio'].length == 0) {
            alerta += '\nEl PRECIO debe ser un valor mayor a 0\n';
        }
        if (isNaN(parseInt(descripcion['precio']))) {
            alerta += '\nEl PRECIO debe ser un valor mayor a 0\n';
        }
        if (descripcion['precio'] < 99.99) {
            alerta += '\nEl PRECIO debe ser un valor mayor a 0\n';
        }

        // Validar DETALLES
        if (descripcion['detalles'].length == 0) {
            alerta += '\nLos DETALLES no pueden quedar vacíos\n';
        }
        if (descripcion['detalles'].length > 250) {
            alerta += '\nos detalles no pueden ser mayores a 250 caracteres.\n';
        }

        // Validar IMAGEN
        if (descripcion['imagen'].length == 0) {
            descripcion['imagen'] = 'img/cat.png'
        }

        if (alerta.length == 0) {
            $.post(url, producto, function (response) {
                let respuesta = JSON.parse(response);
                let template_bar = '';
                template_bar += `
                        <li style="list-style: none;">Etatus: ${respuesta.estatus}</li>
                        <li style="list-style: none;">${respuesta.mensaje}</li>
                    `;
                document.getElementById("product-result").className = "card my-4 d-block";
                $('#container').html(template_bar);
                console.log(response);
                listarProductos();
                $('#product-form').trigger('reset');
                init();
            });
        } else {
            alert(alerta);
            let template_bar = '';
            template_bar += `
                    <li style="list-style: none;">Estatus:</li>
                    <li style="list-style: none;">No se pudo agregar el producto</li>
                `;
            document.getElementById("product-result").className = "card my-4 d-block";
            $('#container').html(template_bar);
        }
    });

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function (response) {
                let productos = JSON.parse(response);
                if (Object.keys(productos).length > 0) {
                    let template = '';
                    productos.forEach(producto => {

                        let descripcion = '';
                        descripcion += '<li>marca: ' + producto.marca + '</li>';
                        descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                        descripcion += '<li>precio: ' + producto.precio + '</li>';
                        descripcion += '<li>detalles: ' + producto.detalles + '</li>';
                        descripcion += '<li>unidades: ' + producto.unidades + '</li>';

                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td>
                                    <a href="#" class="product-item">${producto.nombre}</a>
                                </td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#products').html(template);
                }
            }
        });
    }

    $(document).on('click', '.product-item', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('productId');
        $.post('./backend/product-single.php', {
            id
        }, function (response) {
            console.log(response);
            let producto = JSON.parse(response);
            let info = {
                "marca": producto.marca,
                "modelo": producto.modelo,
                "precio": producto.precio,
                "detalles": producto.detalles,
                "unidades": producto.unidades,
                "imagen": producto.imagen
            };
            var infoString = JSON.stringify(info, null, 2);
            $('#name').val(producto.nombre);
            $('#description').val(infoString);
            $('#productoId').val(id);
            edit = true;
        });
    });

    $(document).on('click', '.product-delete', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('productId');
        if (confirm("Realmente deseas eliminar el Producto")) {
            $.post('./backend/product-delete.php', {
                id
            }, function (response) {
                let respuesta = JSON.parse(response);
                let template_bar = '';
                template_bar += `
                            <li style="list-style: none;">Estatus: ${respuesta.estatus}</li>
                            <li style="list-style: none;">${respuesta.mensaje}</li>
                        `;
                document.getElementById("product-result").className = "card my-4 d-block";
                document.getElementById("container").innerHTML = template_bar;
                listarProductos();
            });
        }
    });
});