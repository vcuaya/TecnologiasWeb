<?php

use DataBase\Productos;

require_once './API/productos.php';

$var = new Productos('marketzone');

$var->unique($_GET);

echo $var->getResponse();
