<?php

use Kaiser\Update\Update as Update;

require_once __DIR__ . '/API/start.php';

$var = new Update();

$var->edit($_POST);

echo $var->getResponse();
