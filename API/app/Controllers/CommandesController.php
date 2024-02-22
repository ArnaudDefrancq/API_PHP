<?php

namespace projetApi\Controllers;

use projetApi\Models\DAO;


class CommandesController
{
    public static function getList()
    {
        $list = DAO::select("commandes", ["idCommande", "id_client", "id_produit", "quantite", "date_commande"],  null, null, null, false);

        if ($list == false) {
            return false;
        }

        return $list;
    }

    public static function getCommandes(int $id)
    {
        $oneItem = DAO::select("commandes", ["idCommande", "id_client", "id_produit", "quantite", "date_commande"], ["idCommande" => $id]);

        if ($oneItem == false) {
            return false;
        }

        return $oneItem;
    }

    public static function createCommandes($request, $tableName)
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

    public static function updateCommandes($request, $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $data = json_decode($request->body(), true);
        $obj = new $class($data);

        return DAO::update($obj);
    }

    public static function deleteCommandes(int $id, string $tableName)
    {
        $class = 'Toyger\Api\Models\\' . $tableName;
        $obj = new $class();

        return DAO::delete($id, $obj);
    }
}
