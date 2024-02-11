<?php

namespace Toyger\Api\Routes;

$app = new \Klein\App();


$app->respond('GET', '[:table]', function ($request) {
    $tableName = $request->table;
    $controllerName = ucfirst($tableName) . "Controller";

    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $controller->getAll . ucfirst($tableName)();
    } else {
        echo "Table non trouvée";
    }
});

$app->respond('GET', '[:table]', function ($request) {
});
$app->respond('POST', '[:table]', function ($request) {
});
$app->respond('PUT', '[:table]', function ($request) {
});
$app->respond('DELETE', '[:table]', function ($request) {
});
