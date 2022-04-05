<?php

use Kaiser\Create\Create as Create;

require_once __DIR__ . '/API/start.php';

$var = new Create();

$var->add($_POST);

echo $var->getResponse();
