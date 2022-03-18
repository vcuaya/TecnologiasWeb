<?php
include_once __DIR__ . '/database.php';

if (isset($_POST['name'])) {
    $data = array(
        'estatus'  => 'error',
        'mensaje' => 'El producto ya existe en la base de datos'
    );
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "SELECT * FROM productos WHERE nombre = '{$name}' AND eliminado = 0";
    $result = $conexion->query($sql);
    $jsonOBJ = json_decode($description);
    if ($result->num_rows == 0) {
        $conexion->set_charset("utf8");
        $sql = "INSERT INTO productos VALUES (
            null,
            '{$name}',
            '{$jsonOBJ->marca}',
            '{$jsonOBJ->modelo}',
            {$jsonOBJ->precio},
            '{$jsonOBJ->detalles}',
            {$jsonOBJ->unidades},
            '{$jsonOBJ->imagen}',
            0
        )";
        if ($conexion->query($sql)) {
            $data['estatus'] =  "Correcto";
            $data['mensaje'] =  "El producto se agregó correctamente";
        } else {
            $data['mensaje'] = "No se pudo agregar el producto";
        }
    }
    $result->free();
    $conexion->close();
}
echo json_encode($data, JSON_PRETTY_PRINT);
