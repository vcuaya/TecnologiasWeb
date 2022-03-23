<?php
$conexion = @mysqli_connect(
    'localhost',
    'root',
    'localhost',
    'marketzone'
);
if (!$conexion) {
    die('No se pudo conectar a la base de datos');
}
