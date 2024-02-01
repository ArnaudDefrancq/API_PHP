<?php
class BookManager
{
    /**
     * Ajout d'une personne en base de donnée
     *
     * @param Book $b
     * @return void
     */
    static public function create(string $class, object $object)
    {
        DAO::create($class, $object);
    }
}
