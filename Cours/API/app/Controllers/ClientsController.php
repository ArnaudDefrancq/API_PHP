<?php

namespace Toyger\Api\Controllers;

use Klein\Response;
use Toyger\Api\Models\DAO;

class ClientsController
{
    public static function getList()
    {
        $list = DAO::select("clients", ["idClient", "nom", "email", "adresse"],  null, null, null, false);

        if ($list == false) {
            return new Response("Auncune donnée", 503, []);
        }

        echo $list;
    }

    public static function getClients(int $id)
    {
        $oneItem = DAO::select("clients", ["idClient", "nom", "email", "adresse"], ["idClient" => $id]);

        var_dump($oneItem);
        if ($oneItem == false) {
            return new Response("Auncune donnée", 503, []);
        }

        echo $oneItem;
    }

    // public static function createClients(string $name, $request)
    // {
    //     return DAO::create($object);
    // }

    // public static function updateClient(object $object)
    // {
    //     return DAO::update($object);
    // }

    // public static function deleteClient(int $id)
    // {
    // }
}
