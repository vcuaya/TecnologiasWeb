<?php

namespace Kaiser\Read;

use Kaiser\DataBase;

class Read extends DataBase
{
    public function __construct($string = 'marketzone')
    {
        $this->response = "";
        parent::__construct($string);
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
