<?php

namespace DataBase;

use DataBase\DataBase;

require_once __DIR__ . '/database.php';

class Productos extends DataBase
{
    private $response;
    
    public function __construct($string = 'marketzone')
    {
        $this->response = "";
        parent::__construct($string);
    }
    
    public function getResponse()
    {
        return json_encode($this->response, JSON_PRETTY_PRINT);
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

    public function list()
    {
        $this->response = array();
        if ($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if (!is_null($rows)) {
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = $value;
                    }
                }
            }
            $result->free();
        } else {
            die('No se pudo completar la operación');
        }
        $this->conexion->close();
    }

    public function delete($post)
    {
        $this->response = array(
            'estatus'  => 'Erro',
            'mensaje' => 'No se pudo realizar la operación'
        );

        if (isset($post['id'])) {
            $id = $post['id'];

            $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
            if ($this->conexion->query($sql)) {
                $this->response['estatus'] =  "Correcto";
                $this->response['mensaje'] =  "El producto se eliminó correctamente";
            } else {
                $this->response['message'] = "No se pudo ejecutar la instrucción $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
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

    public function search($get)
    {
        $this->response = array();
        if (isset($get['search'])) {
            $search = $get['search'];
            $sql = "SELECT * FROM productos WHERE (
        id = '{$search}' 
        OR nombre LIKE '%{$search}%' 
        OR marca LIKE '%{$search}%' 
        OR modelo LIKE '%{$search}%' 
        OR detalles LIKE '%{$search}%'
        ) AND eliminado = 0";
            if ($result = $this->conexion->query($sql)) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if (!is_null($rows)) {
                    foreach ($rows as $num => $row) {
                        foreach ($row as $key => $value) {
                            $this->response[$num][$key] = $value;
                        }
                    }
                }
                $result->free();
            } else {
                die('No se pudo completar la operación');
            }
            $this->conexion->close();
        }
    }

    public function single($post)
    {
        $id = $post['id'];
        $sql = "SELECT * FROM productos WHERE id = $id";
        $result = mysqli_query($this->conexion, $sql);
        if (!$result) {
            die('No se pudo completar la operación');
        }
        $this->response = array();
        while ($row = mysqli_fetch_array($result)) {
            $this->response = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'precio' => $row['precio'],
                'detalles' => $row['detalles'],
                'unidades' => $row['unidades'],
                'imagen' => $row['imagen']
            );
        }
    }
    public function unique($get)
    {
        $this->response = array();
        if (isset($get['search'])) {
            $search = $get['search'];
            $sql = "SELECT * FROM productos WHERE nombre = '{$search}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            if ($result->num_rows != 0) {
                $this->response['estatus'] =  "Incorrecto";
                $this->response['mensaje'] =  "El nombre del producto ya existe";
            }
            $result->free();
            $this->conexion->close();
        }
    }
}
