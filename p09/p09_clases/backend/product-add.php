<?php

// namespace\Clase
use DataBase\Productos;

require_once './API/productos.php';

$var = new Productos('marketzone');

$var->add($_POST);

echo $var->getResponse();
