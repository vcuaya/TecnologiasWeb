<?php
include_once __DIR__ . '/database.php';

$data = array();
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM productos WHERE (
        id = '{$search}' 
        OR nombre LIKE '%{$search}%' 
        OR marca LIKE '%{$search}%' 
        OR modelo LIKE '%{$search}%' 
        OR detalles LIKE '%{$search}%'
        ) AND eliminado = 0";
    if ($result = $conexion->query($sql)) {
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
}
echo json_encode($data, JSON_PRETTY_PRINT);
