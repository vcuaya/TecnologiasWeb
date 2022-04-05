<?php

namespace Kaiser\Update;

use Kaiser\DataBase;

class Update extends DataBase
{
    public function __construct($string = 'marketzone')
    {
        $this->response = "";
        parent::__construct($string);
    }

    public function edit($post)
    {
        $this->response = array(
            'estatus'  => 'Error',
            'mensaje' => 'El producto ya existe en la base de datos'
        );
        if (isset($post['id'])) {
            $id = $post['id'];
            $nombre = $post['nombre'];
            $marca = $post['marca'];
            $modelo = $post['modelo'];
            $precio = $post['precio'];
            $detalles = $post['detalles'];
            $unidades = $post['unidades'];
            $imagen = $post['imagen'];
            $sql = "UPDATE productos SET 
                nombre = '{$nombre}',
                marca = '{$marca}',
                modelo ='{$modelo}',
                precio = {$precio},
                detalles = '{$detalles}',
                unidades = {$unidades},
                imagen ='{$imagen}'
                WHERE id = '{$id}'";
            $this->conexion->set_charset("utf8");
            if ($this->conexion->query($sql)) {
                $this->response['estatus'] =  "Correcto";
                $this->response['mensaje'] =  "El producto se actualizó correctamente";
            } else {
                $this->response['mensaje'] = "No se pudo ejecutar la instrucción $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }
}
