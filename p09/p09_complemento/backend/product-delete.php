<?php
include_once __DIR__ . '/database.php';

$data = array(
    'estatus'  => 'Erro',
    'mensaje' => 'No se pudo realizar la operación'
);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
    if ($conexion->query($sql)) {
        $data['estatus'] =  "Correcto";
        $data['mensaje'] =  "El producto se eliminó correctamente";
    } else {
        $data['message'] = "No se pudo ejecutar la instrucción $sql. " . mysqli_error($conexion);
    }
    $conexion->close();
}
echo json_encode($data, JSON_PRETTY_PRINT);
