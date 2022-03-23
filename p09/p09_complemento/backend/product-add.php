<?php
include_once __DIR__ . '/database.php';

$data = array(
    'estatus'  => 'error',
    'mensaje' => 'El producto ya existe en la base de datos'
);
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];
    $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
    $result = $conexion->query($sql);
    if ($result->num_rows == 0) {
        $conexion->set_charset("utf8");
        $sql = "INSERT INTO productos VALUES (
            null,
            '{$nombre}',
            '{$marca}',
            '{$modelo}',
            {$precio},
            '{$detalles}',
            {$unidades},
            '{$imagen}',
            0
        )";
        if ($conexion->query($sql)) {
            $data['estatus'] =  "Correcto";
            $data['mensaje'] =  "El producto se agregó correctamente";
        } else {
            $data['mensaje'] = "No se pudo ejecutar la instrucción $sql. " . mysqli_error($conexion);
        }
    }
    $result->free();
    $conexion->close();
}
echo json_encode($data, JSON_PRETTY_PRINT);
