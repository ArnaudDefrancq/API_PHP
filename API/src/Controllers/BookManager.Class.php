<?php
class BookManager
{
    /**
     * Ajout d'une personne en base de donnée
     *
     * @param Book $b
     * @return void
     */
    static public function create(object $object)
    {
        DAO::create($object);
    }

    /**
     * Update d'une personne en base de donnée
     *
     * @param Personne $p
     * @return void
     */
    static public function update(object $object)
    {
        DAO::update($object);
    }

    /**
     * Supprime une personne en base de donnée
     *
     * @param string $table
     * @param object $object
     * @return void
     */
    static public function delete(object $object)
    {
        DAO::delete($object);
    }

    /**
     * Permet de sélectionner un objet grace à son ID
     *
     * @param int $id
     * @return object
     */
    static public function findById(string $table, int $id)
    {
        DAO::select($table, null, ["id.$table" => $id]);
    }
}
