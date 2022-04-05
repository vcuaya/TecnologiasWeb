<?php

namespace Kaiser\Create;

use Kaiser\DataBase;

class Create extends DataBase
{
    public function __construct($string = 'marketzone')
    {
        $this->response = "";
        parent::__construct($string);
    }

    public function add($post)
    {
        $this->response = array(
            'estatus'  => 'error',
            'mensaje' => 'El producto ya existe en la base de datos'
        );
        if (isset($post['nombre'])) {
            $nombre = $post['nombre'];
            $marca = $post['marca'];
            $modelo = $post['modelo'];
            $precio = $post['precio'];
            $detalles = $post['detalles'];
            $unidades = $post['unidades'];
            $imagen = $post['imagen'];
            $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (
                    null,
                    '{$nombre}',
                    '{$marca}',
                    '{$modelo}',
                    {$precio},
                    '{$detalles}',
                    {$unidades},
                    '{$imagen}',
                    0
                )";
                if ($this->conexion->query($sql)) {
                    $this->response['estatus'] =  "Correcto";
                    $this->response['mensaje'] =  "El producto se agregó correctamente";
                } else {
                    $this->response['mensaje'] = "No se pudo ejecutar la instrucción $sql. " . mysqli_error($this->conexion);
                }
            }
            $result->free();
            $this->conexion->close();
        }
    }
}
