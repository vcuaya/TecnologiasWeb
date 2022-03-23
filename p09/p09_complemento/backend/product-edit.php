<?php
include_once __DIR__ . '/database.php';
$data = array(
    'estatus'  => 'Error',
    'mensaje' => 'El producto ya existe en la base de datos'
);
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];
    $sql = "UPDATE productos SET 
        nombre = '{$nombre}',
        marca = '{$marca}',
        modelo ='{$modelo}',
        precio = {$precio},
        detalles = '{$detalles}',
        unidades = {$unidades},
        imagen ='{$imagen}'
        WHERE id = '{$id}'";
    $conexion->set_charset("utf8");
    if ($conexion->query($sql)) {
        $data['estatus'] =  "Correcto";
        $data['mensaje'] =  "El producto se actualizó correctamente";
    } else {
        $data['mensaje'] = "No se pudo ejecutar la instrucción $sql. " . mysqli_error($conexion);
    }
    $conexion->close();
}
echo json_encode($data, JSON_PRETTY_PRINT);
