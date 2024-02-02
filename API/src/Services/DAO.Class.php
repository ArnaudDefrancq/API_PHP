<?php
class DAO
{
    /**
     * Permet d'ajouter un élément dans la base de donnée avec l'ID de la ligne
     *
     * @param string $table Table où l'on veut ajouter des choses
     * @param object $newData objet a ajouter à la base de donnée
     * @return void
     */
    static public function create(object $newData)
    {
        $db = DbConnect::getDb();
        $table = get_class($newData);
        $allAttributs = $newData::getAttributs();
        $req = '';
        $value = '';

        // prépare les paramètres
        for ($i = 1; $i < count($allAttributs); $i++) {
            $methode = $newData->{'get' . ucfirst($allAttributs[$i])}();
            if ($methode !== null) {
                $req .= $allAttributs[$i] . ", ";
                // var_dump("req : " . $req);
                $value .= ":" . $allAttributs[$i] . ", ";
                // var_dump("value : " . $value);
            }
        }

        $query = $db->prepare("INSERT INTO " . $table . "(" . substr($req, 0, -2) . ") VALUES (" . substr($value, 0, -2) . ")");
        // var_dump($query);

        // on prépare les bind
        for ($i = 1; $i < count($allAttributs); $i++) {
            $methode = $newData->{'get' . ucfirst($allAttributs[$i])}();
            if ($methode !== null) {
                $query->bindValue(':' . $allAttributs[$i], $methode);
            }
        }
        $query->execute();


        // Vérifier les erreurs
        $errorInfo = $query->errorInfo();
        if ($errorInfo[0] !== '00000') {
            // Afficher les erreurs si elles existent
            var_dump($errorInfo);
        }

        // récup le dernier Id
        return $db->lastInsertId();
    }

    /**
     * Permet de modifier des données dans une BDD
     *
     * @param string $table nom de la table 
     * @param object $newData objet modifier
     * @return void
     */
    static public function update(object $newData)
    {
        $db = DbConnect::getDb();
        $table = get_class($newData);
        $allAttributs = $newData::getAttributs();
        $req = '';

        // prépare les paramètres
        foreach ($allAttributs as $attributs) {
            $methode = $newData->{'get' . ucfirst($attributs)}();
            if ($methode !== null) {
                $req .= $attributs . " = :" . $attributs . ", ";
            }
        }
        $query = $db->prepare("UPDATE " . $table . " SET " . substr($req, 0, -2) . " WHERE " . $allAttributs[0] . " = :" . $allAttributs[0]);

        // on prépare les bind
        foreach ($allAttributs as $attributs) {
            $methode = $newData->{'get' . ucfirst($attributs)}();
            if ($methode !== null) {
                $query->bindValue(':' . $attributs, $methode);
            }
        }
        $query->execute();
    }
}
