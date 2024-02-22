<?php

use projetApi\Models\ConnectBDD;
use projetApi\Controllers\Parametre;

require "./vendor/autoload.php";
require "./app/Routes/Route.php";

Parametre::getConfig();

ConnectBDD::init();

header('Content-Type: application/json');

$app->dispatch();
