<?php

namespace Toyger\Api\Controllers;

use Toyger\Api\Models\DAO;

class ClientsController
{
    public static function getList()
    {
        return DAO::select("clients", ["id", "nom", "email", "adresse"],  null, null, null, false);
    }

    public static function getClients(int $id)
    {
        return DAO::select("clients", ["id", "nom", "email", "adresse"], ["id" => $id]);
    }

    public static function createClient(object $object)
    {
        return DAO::create($object);
    }

    // public static function updateClient(int $id, Client $object)
    // {
    // }

    // public static function deleteClient(int $id)
    // {
    // }
}
