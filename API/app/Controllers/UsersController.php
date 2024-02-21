<?php

namespace Toyger\Api\Controllers;

use Toyger\Api\Models\DAO;

class UsersController
{
    public static function getList()
    {
        $list = DAO::select("users", ["idUser", "nom", "prenom", "email", "password", "adresse"],  null, null, null, true);

        if ($list == false) {
            return false;
        }

        return $list;
    }

    public static function getUsers(int $id)
    {
        $oneItem = DAO::select("users", ["idUser", "nom", "prenom", "email", "password", "adresse"], ["idUser" => $id]);

        if ($oneItem == false) {
            return false;
        }

        return $oneItem;
    }

    public static function createUsers($request, $tableName)
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

    public static function updateUsers($request, $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $data = json_decode($request->body(), true);
        $obj = new $class($data);

        return DAO::update($obj);
    }

    public static function deleteUsers(int $id, string $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $obj = new $class();

        return DAO::delete($id, $obj);
    }
}
