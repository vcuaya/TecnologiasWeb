<?php
include_once __DIR__ . '/database.php';

$data = array();
if ($result = $conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    if (!is_null($rows)) {
        foreach ($rows as $num => $row) {
            foreach ($row as $key => $value) {
                $data[$num][$key] = $value;
            }
        }
    }
    $result->free();
} else {
    die('No se pudo completar la operación');
}
$conexion->close();
echo json_encode($data, JSON_PRETTY_PRINT);
