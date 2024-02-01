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
     * @param Book $b
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
    static public function findById($id)
    {
        DAO::select("Book", null, ["idBook" => $id]);
    }

    /**
     * Permet d'obtenir une liste d'objet issu de la base de donnée. On peut définir les colonnes, les conditions, l'orderBy, la limit/offset. Si la requête n'aboutie pas return false
     *
     * @param array|null $colonnes Nom des colonnes présents dans la base de donnée
     * @param array|null $conditions Conditions dans un array associatif. 
     *  - ">" ou "<" pour des comparaisons
     *  - "!" pour inégalité
     *  - "->" pour BETWEN
     *  - "" pour IS NULL
     *  - [array] pour IN
     *  - "%" pour LIKE
     *  - Si rien de spéciale pour comparaison  
     * @param array|null $orderBy array associatif [nom_colonne => true (ASC) / false (DESC)]
     * @param string|null $limit Définit la limit ex: "2,10"
     * @param boolean|null $debug si true on affiche la requête formulée
     * @return array(object)
     */
    static public function getList(?array $colonnes = null, ?array $conditions = null, ?array $orderBy = null, ?string $limit = null, ?bool $debug = false)
    {
        DAO::select("Book", $colonnes, $conditions, $orderBy, $limit, $debug);
    }
}
