<?php
include_once __DIR__ . '/database.php';

$data = array();
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM productos WHERE nombre = '{$search}' AND eliminado = 0";
    $result = $conexion->query($sql);
    if ($result->num_rows != 0) {
        $data['estatus'] =  "Incorrecto";
        $data['mensaje'] =  "El nombre del producto ya existe";
    }
    $result->free();
    $conexion->close();
}
echo json_encode($data, JSON_PRETTY_PRINT);
