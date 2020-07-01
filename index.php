<?php

define('WEBROOT', str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require_once(ROOT . 'Config/core.php');
require_once(ROOT . 'router.php');

$router = new Router();
$router->dispatch();