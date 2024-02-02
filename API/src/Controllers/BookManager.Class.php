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
}
