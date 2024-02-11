<?php

use GuzzleHttp\Psr7\ServerRequest;

use function Http\Response\send;

require '../vendor/autoload.php';

$app = new \CoursGrafikart\App([
    BlogModule::class
]);

$response = $app->run(ServerRequest::fromGlobals());

send($response);
