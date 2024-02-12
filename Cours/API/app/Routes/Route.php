<?php

namespace Toyger\Api\Routes;

use Klein\Klein;

$app = new Klein();

$app->respond('GET', '/api/[:name]', function ($request) {
    $tableName = $request->name;
    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $getList = $controller->getList();

        if ($getList !== false) {
            header('Content-Type: application/json');
            echo $getList;
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Erreur lors de la récupération de la liste."));
        }
    } else {
        echo "Table non trouvée";
    }
});

$app->respond('GET', '/api/[:name]/[:id]', function ($request) {
    $tableName = $request->name;
    $id = intval($request->id);
    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $method = 'get' . ucfirst($tableName);
        $oneItem = $controller->$method($id);

        if ($oneItem !== false) {
            header('Content-Type: application/json');
            echo $oneItem;
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Erreur lors de la récupération d'un item."));
        }
    } else {
        echo "Table non trouvée";
    }
});

$app->respond('POST', 'api/[:name]/[:id]/create', function ($request) {
});
$app->respond('PUT', '[:table]', function ($request) {
});
$app->respond('DELETE', '[:table]', function ($request) {
});

return $app;
