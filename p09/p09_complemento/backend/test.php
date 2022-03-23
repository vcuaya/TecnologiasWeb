<?php
include_once __DIR__ . '/database.php';


    $search = "Nombre";
    $sql = "SELECT * FROM productos WHERE nombre = '{$search}' AND eliminado = 0";
    $result = $conexion->query($sql);
    if ($result->num_rows <= 0)
        echo("Nulo");
