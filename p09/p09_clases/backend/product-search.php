<?php

use DataBase\Productos;

require_once './API/productos.php';

$var = new Productos('marketzone');

$var->search($_GET);

echo $var->getResponse();
