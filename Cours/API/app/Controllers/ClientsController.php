<?php

namespace Toyger\Api\Controllers;

use Klein\Response;
use Reflection;
use ReflectionClass;
use ReflectionProperty;

use Toyger\Api\Models\DAO;
use Toyger\Api\Tools\Security;

class ClientsController
{
    public static function getList()
    {
        $list = DAO::select("clients", ["idClient", "nom", "email", "adresse"],  null, null, null, false);

        if ($list == false) {
            return false;
        }

        return $list;
    }

    public static function getClients(int $id)
    {
        $oneItem = DAO::select("clients", ["idClient", "nom", "email", "adresse"], ["idClient" => $id]);

        if ($oneItem == false) {
            return false;
        }

        return $oneItem;
    }

    public static function createClients($request, $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $data = json_decode($request->body(), true);
        $obj = new $class($data);

        $new = DAO::create($obj);

        if ($new === false) {
            return false;
        }

        return $new;
    }

    public static function updateClients($request, $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $data = json_decode($request->body(), true);
        $obj = new $class($data);

        return DAO::update($obj);
    }

    public static function deleteClients(object $object)
    {

        return DAO::delete($object);
    }
}
