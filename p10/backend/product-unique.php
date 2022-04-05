<?php

use Kaiser\Read\Read as Read;

require_once __DIR__ . '/API/start.php';

$var = new Read();

$var->unique($_GET);

echo $var->getResponse();
