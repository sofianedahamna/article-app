<?php

require('vendor/autoload.php');

use Digi\Keha\Kernel\Dispatcher;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
