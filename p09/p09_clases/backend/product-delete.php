<?php

use DataBase\Productos;

require_once './API/productos.php';

$var = new Productos('marketzone');

$var->delete($_POST);

echo $var->getResponse();
