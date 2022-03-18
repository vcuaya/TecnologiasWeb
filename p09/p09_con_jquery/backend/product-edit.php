<?php
include_once __DIR__ . '/database.php';
$data = array(
    'estatus'  => 'Error',
    'message' => 'El producto ya existe en la base de datos'
);
$id = $_POST['id'];
$nombre = $_POST['name'];
$description = $_POST['description'];
$jsonOBJ = json_decode($description);
$conexion->set_charset("utf8");
$sql = "UPDATE productos SET 
    nombre = '{$nombre}',
    marca = '{$jsonOBJ->marca}',
    modelo ='{$jsonOBJ->modelo}',
    precio = {$jsonOBJ->precio},
    detalles = '{$jsonOBJ->detalles}',
    unidades = {$jsonOBJ->unidades},
    imagen ='{$jsonOBJ->imagen}',
    eliminado = 0 
    WHERE id = '{$id}'";
if ($conexion->query($sql)) {
    $data['estatus'] =  "Correcto";
    $data['mensaje'] =  "El producto se actualizó correctamente";
} else {
    $data['message'] = "No se pudo actualizar el producto";
}
$conexion->close();
echo json_encode($data, JSON_PRETTY_PRINT);
