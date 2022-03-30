<?php

use DataBase\Productos;

require_once './API/productos.php';

$var = new Productos('marketzone');

$var->edit($_POST);

echo $var->getResponse();
