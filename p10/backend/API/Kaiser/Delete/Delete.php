<?php

namespace Kaiser\Delete;

use Kaiser\DataBase;

class Delete extends DataBase
{
    public function __construct($string = 'marketzone')
    {
        $this->response = "";
        parent::__construct($string);
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
}
