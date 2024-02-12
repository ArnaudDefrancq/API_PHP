<?php

namespace Toyger\Api\Routes;

use Klein\Klein;

$app = new Klein();

$app->respond('GET', '/[:name]', function ($request) {
    $tableName = $request->name;
    $controllerName = 'Toyger\Api\Controllers\\' . ucfirst($tableName) . 'Controller';

    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $listeClients = $controller->getList();

        if ($listeClients !== false) {
            header('Content-Type: application/json');
            echo $listeClients;
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Erreur lors de la récupération de la liste des clients."));
        }
    } else {
        echo "Table non trouvée";
    }
});

$app->respond('GET', '/[:name]/[:id]', function ($request) {
});
$app->respond('POST', '[:table]', function ($request) {
});
$app->respond('PUT', '[:table]', function ($request) {
});
$app->respond('DELETE', '[:table]', function ($request) {
});

return $app;
