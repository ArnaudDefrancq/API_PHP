<?php

use Toyger\Api\Controllers\ClientsController;
use Toyger\Api\Models\ConnectBDD;
use Toyger\Api\Controllers\Parametre;
use Toyger\Api\Models\Clients;

require "./vendor/autoload.php";
require "./app/Routes/Route.php";

Parametre::getConfig();

ConnectBDD::init();

header('Content-Type: application/json');

var_dump('Ceci est mon API !');

$app->dispatch();
