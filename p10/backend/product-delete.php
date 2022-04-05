<?php

use Kaiser\Delete\Delete as Delete;

require_once __DIR__ . '/API/start.php';

$var = new Delete();

$var->delete($_POST);

echo $var->getResponse();
