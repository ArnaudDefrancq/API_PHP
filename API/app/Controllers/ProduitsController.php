<?php

namespace Toyger\Api\Controllers;

use Toyger\Api\Models\DAO;


class ProduitsController
{
    public static function getList()
    {
        $list = DAO::select("produits", ["idProduit", "nom", "description", "prix", "categorie"],  null, null, null, false);

        if ($list == false) {
            return false;
        }

        return $list;
    }

    public static function getProduits(int $id)
    {
        $oneItem = DAO::select("produits", ["idProduit", "nom", "description", "prix", "categorie"], ["idProduit" => $id]);

        if ($oneItem == false) {
            return false;
        }

        return $oneItem;
    }

    public static function createProduits($request, $tableName)
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

    public static function updateProduits($request, $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $data = json_decode($request->body(), true);
        $obj = new $class($data);

        return DAO::update($obj);
    }

    public static function deleteProduits(int $id, string $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $obj = new $class();

        return DAO::delete($id, $obj);
    }
}
