<?php

use Webtechnologies\Config\App;
use Webtechnologies\Controllers\UserController;
use Webtechnologies\Controllers\AccountController;

require_once __DIR__ . '/app/start.php';

//$user = new User();
//$user = new UserTemplate();
//$user = new UserController();

//$user = new Account();
//$user = new AccountTemplate();
$user = new AccountController();
