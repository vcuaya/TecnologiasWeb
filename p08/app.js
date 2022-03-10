// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "sku": "Part Number",
    "marca": "NA",
    "modelo": "XX-000",
    "precio": 0.0,
    "detalles": "NA",
    "unidades": 1,
    "imagen": "img/default.png"
};

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            //console.log('[CLIENTE]\n' + client.responseText);

            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText); // similar a eval('('+client.responseText+')');

            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if (Object.keys(productos).length > 0) {

                document.getElementById("productos").innerHTML = '';
                var tbody = document.getElementById('productos');

                for (var i = 0; i < productos.length; i++) {
                    var tr = document.createElement('tr');
                    var th = document.createElement('th');
                    th.setAttribute('scope', 'row');

                    var tdSKU = document.createElement('td');
                    var tdNombre = document.createElement('td');
                    var tdMarca = document.createElement('td');
                    var tdModelo = document.createElement('td');
                    var tdPrecio = document.createElement('td');
                    var tdDetalles = document.createElement('td');
                    var tdUnidades = document.createElement('td');
                    var tdImagen = document.createElement('td');

                    var idText = document.createTextNode(productos[i].id);
                    var skuText = document.createTextNode(productos[i].sku);
                    var nombreText = document.createTextNode(productos[i].nombre);
                    var marcaText = document.createTextNode(productos[i].marca);
                    var modeloText = document.createTextNode(productos[i].modelo);
                    var precioText = document.createTextNode(productos[i].precio);
                    var detallesText = document.createTextNode(productos[i].detalles);
                    var unidadesText = document.createTextNode(productos[i].unidades);
                    var img = document.createElement('img');
                    img.setAttribute('src', productos[i].imagen);

                    tdSKU.appendChild(skuText);
                    tdNombre.appendChild(nombreText);
                    tdMarca.appendChild(marcaText);
                    tdModelo.appendChild(modeloText);
                    tdPrecio.appendChild(precioText);
                    tdDetalles.appendChild(detallesText);
                    tdUnidades.appendChild(unidadesText);
                    tdImagen.appendChild(img);

                    th.appendChild(idText);

                    tr.appendChild(th);
                    tr.appendChild(tdSKU);
                    tr.appendChild(tdNombre);
                    tr.appendChild(tdMarca);
                    tr.appendChild(tdModelo);
                    tr.appendChild(tdDetalles);
                    tr.appendChild(tdUnidades);
                    tr.appendChild(tdPrecio);
                    tr.appendChild(tdImagen);

                    console.log("ID: " + productos[i].id);
                    console.log("\nSKU: " + productos[i].sku);
                    console.log("\nNombre: " + productos[i].nombre);
                    console.log("\nMarca: " + productos[i].marca);
                    console.log("\nModelo: " + productos[i].modelo);
                    console.log("\nPrecio: " + productos[i].precio);
                    console.log("\nDetalles: " + productos[i].detalles);
                    console.log("\nUnidades: " + productos[i].unidades);
                    console.log("\nImagen: " + productos[i].imagen);

                    tbody.appendChild(tr);

                    // for (var producto of productos) {
                    //     console.log(producto);
                    //     // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    //     let descripcion = '';
                    //     descripcion += '<li>sku: ' + producto.sku + '</li>';
                    //     descripcion += '<li>precio: ' + producto.precio + '</li>';
                    //     descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                    //     descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                    //     descripcion += '<li>marca: ' + producto.marca + '</li>';
                    //     descripcion += '<li>detalles: ' + producto.detalles + '</li>';
                    //     // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                    //     let template = '';
                    //     template += `
                    //         <tr>
                    //             <td>${producto.id}</td>
                    //             <td>${producto.nombre}</td>
                    //             <td><ul>${descripcion}</ul></td>
                    //         </tr>
                    //     `;
                    //     // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    //     document.getElementById("productos").innerHTML += template;
                }
            }
        }
    };
    client.send("id=" + id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    var alerta = "";

    // Validar SKU
    if (finalJSON['sku'].length == 0) {
        alerta += '\nEl SKU no puede quedar vacío\n';
    }
    if (finalJSON['sku'].length > 25) {
        alerta += '\nEl SKU no puede ser mayor a 25 caracteres\n';
    }

    // Validar NOMBRE
    if (finalJSON['nombre'].length == 0) {
        alerta += '\nEl NOMBRE no puede quedar vacío\n';
    }
    if (finalJSON['nombre'].length > 100) {
        alerta += '\nEl NOMBRE no puede ser mayor a 100 caracteres.\n';
    }

    // Validar MARCA
    if (finalJSON['marca'].length == 0) {
        alerta += '\nLa MARCA no puede quedar vacía\n';
    }

    // Validar MODELO
    if (finalJSON['modelo'].length == 0) {
        alerta += '\nEl MODELO no puede quedar vacío\n';
    }
    if (finalJSON['modelo'].length > 25) {
        alerta += '\nEl MODELO no puede ser mayor a 25 caracteres.\n';
    }

    // Validar UNIDADES
    if (finalJSON['unidades'].length == 0) {
        alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
    }
    if (isNaN(parseInt(finalJSON['unidades']))) {
        alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
    }
    if (finalJSON['unidades'] < 1) {
        alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
    }
    if (finalJSON['unidades'] % 1 !== 0) {
        alerta += '\nLa CANTIDAD debe ser un valor entero mayor a 0\n';
    }

    // Validar PRECIO
    if (finalJSON['precio'].length == 0) {
        alerta += '\nEl PRECIO debe ser un valor mayor a 0\n';
    }
    if (isNaN(parseInt(finalJSON['precio']))) {
        alerta += '\nEl PRECIO debe ser un valor mayor a 0\n';
    }
    if (finalJSON['precio'] < 99.99) {
        alerta += '\nEl PRECIO debe ser un valor mayor a 0\n';
    }

    // Validar DETALLES
    if (finalJSON['detalles'].length == 0) {
        alerta += '\nLos DETALLES no pueden quedar vacíos\n';
    }
    if (finalJSON['detalles'].length > 250) {
        alerta += '\nos detalles no pueden ser mayores a 250 caracteres.\n';
    }

    // Validar IMAGEN
    if (finalJSON['imagen'].length == 0) {
        finalJSON['imagen'] = 'img/cat.png'
    }


    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    if (alerta.length == 0) {
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            if (client.readyState == 4 && client.status == 200) {
                alert(client.responseText);
            }
        };
        client.send(productoJsonString);
    } else {
        alert(alerta);
    }
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try {
        objetoAjax = new XMLHttpRequest();
    } catch (err1) {
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try {
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
}