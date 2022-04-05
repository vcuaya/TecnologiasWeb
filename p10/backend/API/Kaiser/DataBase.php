<?php

namespace Kaiser;

abstract class DataBase
{
    protected $conexion;
    protected $response;

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

    public function getResponse()
    {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
