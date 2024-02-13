<?php

namespace Toyger\Api\Routes;

use Exception;
use Klein\Klein;
use Klein\Response;

$app = new Klein();

$app->respond('GET', '/api/[:name]', function ($request) {
    // Récup du nom de la Table / Class
    $tableName = $request->name;
    //Récup du controller

    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    if (!class_exists($controllerName)) {
        return new Response("Table non trouvée", 503, []);
    }

    // instantier le controller
    $controller = new $controllerName();
    $liste = $controller->getList();

    if ($liste == false) {
        return new Response("Aucun elements", 503, []);
    }

    return new Response($liste, 200, []);
});

$app->respond('GET', '/api/[:name]/[:id]', function ($request) {
    // Récup de nom + Id
    $tableName = $request->name;
    $id = intval($request->id);

    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    // Check si le contorller existe
    if (!class_exists($controllerName)) {
        return new Response("Table non trouvée", 503, []);
    }

    $controller = new $controllerName();
    $method = 'get' . ucfirst($tableName);
    $item = $controller->$method($id);

    if ($item == false) {
        return new Response("Vide", 503, []);
    }

    return new Response($item, 200, []);
});

$app->respond('POST', '/api/[:name]/create', function ($request) {
    $tableName = $request->name;

    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    if (!class_exists($controllerName)) {
        return new Response("Table non trouvée", 503, []);
    }
    $controller = new $controllerName();
    $method = 'create' . ucfirst($tableName);
    $create = $controller->$method($request, ucfirst($tableName));
    if ($create == false) {
        return new Response("Bad Request", 400, []);
    }

    return new Response($create, 201, []);
});

$app->respond('PUT', '/api/[:name]/update/[:id]', function ($request) {
    // Récup du nom + Id
    $tableName = $request->name;
    $id = intval($request->id);
    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    // Check si on a bien le controller
    if (!class_exists($controllerName)) {
        return new Response("Table non trouvée", 503, []);
    }

    // On check si il est en base de donnée
    $controller = new $controllerName();
    $methodGet = 'get' . ucfirst($tableName);
    $oneItem = $controller->$methodGet($id);

    var_dump($oneItem->body());
    // if ($oneItem) {
    //     echo json_encode(array("message" => "Erreur lors de la récupération d'un item."));
    //     return http_response_code(500);
    // }
});
$app->respond('DELETE', '[:table]', function ($request) {
});

return $app;
