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
    $controller->getList();
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
    $controller->$method($id);
});

// $app->respond('POST', '/api/[:name]/create', function ($request) {
//     $tableName = $request->name;

//     $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

//     if (class_exists($controllerName)) {
//         $controller = new $controllerName();
//         $method = 'create' . ucfirst($tableName);
//         $createOne = $controller->$method($newObject);

//         if ($createOne !== false) {
//             header('Content-Type: application/json');
//             echo $createOne;
//         } else {
//             http_response_code(500);
//             echo json_encode(array("message" => "Erreur lors de la création."));
//         }
//     } else {
//         echo "Table non trouvée";
//     }
// });

// $app->respond('PUT', '/api/[:name]/update/[:id]', function ($request) {
//     // Récup du nom + Id
//     $tableName = $request->name;
//     $id = intval($request->id);
//     $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

//     // Check si on a bien le controller
//     if (!class_exists($controllerName)) {
//         echo "Table non trouvée";
//         return http_response_code(500);
//     }

//     // On check si il est en base de donnée
//     $controller = new $controllerName();
//     $methodGet = 'get' . ucfirst($tableName);
//     $oneItem = $controller->$methodGet($id);
//     if ($oneItem == false) {
//         echo json_encode(array("message" => "Erreur lors de la récupération d'un item."));
//         return http_response_code(500);
//     }

//     // Récup du body + Formation du nouvelle objet
//     $objectName = 'Toyger\Api\Models\\' . ucfirst($tableName);
//     $data = json_decode($request->body(), true);
//     $newObject = new $objectName($data);


//     // On fait la modif
//     $methodUpdate = 'update' . ucfirst($tableName);




//     if (class_exists($controllerName)) {
//         $controller = new $controllerName();
//         $method = 'create' . ucfirst($tableName);
//         $createOne = $controller->$method($newObject);

//         if ($createOne !== false) {
//             header('Content-Type: application/json');
//             echo $createOne;
//         } else {
//             http_response_code(500);
//             echo json_encode(array("message" => "Erreur lors de la création."));
//         }
//     } else {
//         echo "Table non trouvée";
//     }
// });
$app->respond('DELETE', '[:table]', function ($request) {
});

return $app;
