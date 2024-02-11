<?php

use Toyger\Api\Models\ConnectBDD;
use Toyger\Api\Controllers\Parametre;
use Toyger\Api\Models\Client;

require "./vendor/autoload.php";

Parametre::getConfig();

ConnectBDD::init();
