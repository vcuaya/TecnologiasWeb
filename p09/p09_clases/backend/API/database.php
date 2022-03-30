<?php

namespace DataBase;

abstract class DataBase
{
    protected $conexion;

    public function __construct($string)
    {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            'localhost',
            $string
        );
        if (!$this->conexion) {
            die('No se pudo conectar a la base de datos');
        }
    }
}
