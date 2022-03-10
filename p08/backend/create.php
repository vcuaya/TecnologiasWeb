<?php
include_once __DIR__ . '/database.php';

$producto = file_get_contents('php://input');
if (!empty($producto)) {
    $jsonOBJ = json_decode($producto);
    $existe = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = '0'";
    $sql = "INSERT INTO productos VALUES(
        null, 
        '{$jsonOBJ->sku}',
        '{$jsonOBJ->nombre}',
        '{$jsonOBJ->marca}',
        '{$jsonOBJ->modelo}',
        {$jsonOBJ->precio},
        '{$jsonOBJ->detalles}',
        {$jsonOBJ->unidades},
        '{$jsonOBJ->imagen}',
        '0'
    );";

    if (($conexion->query($existe)->num_rows == 0) && $conexion->query($sql)) {
        echo 'Producto insertado con ID: ' . $conexion->insert_id;
    } else {
        echo 'El Producto no pudo ser insertado =(';
    }
    $conexion->close();
}
