<?php
include_once __DIR__ . '/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array();
// SE VERIFICA HABER RECIBIDO EL ID
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ($result = $conexion->query("SELECT * FROM productos WHERE id = '{$id}' OR nombre LIKE '%{$id}%' OR marca LIKE '%{$id}%' OR detalles LIKE '%{$id}%';")) {
        // SE OBTIENEN LOS RESULTADOS
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (!is_null($rows)) {
            foreach ($rows as $key => $value) {
                $data[$key] = $value;
            }
        }
        $result->free();
    } else {
        die('Query Error: ' . mysqli_error($conexion));
    }

    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
