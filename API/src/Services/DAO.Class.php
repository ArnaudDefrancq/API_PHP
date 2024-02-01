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
    static public function create(string $class, object $newData)
    {
        $db = DbConnect::getDb();
        $table = get_class($newData);
        $allAttributs = $class::getAttributs();
        $req = '';
        $value = '';

        // prépare les paramètres
        for ($i = 1; $i < count($allAttributs); $i++) {
            $methode = $newData->{'get' . ucfirst($allAttributs[$i])}();
            if ($methode !== null) {
                $req .= $allAttributs[$i] . ", ";
                $value .= ":" . $allAttributs[$i] . ", ";
            }
        }

        $query = $db->prepare("INSERT INTO " . $table . "(" . substr($req, 0, -2) . ") VALUES (" . substr($value, 0, -2) . ")");

        // on prépare les bind
        for ($i = 1; $i < count($allAttributs); $i++) {
            $methode = $newData->{'get' . ucfirst($allAttributs[$i])}();
            if ($methode !== null) {
                $query->bindValue(':' . $allAttributs[$i], $methode);
            }
        }
        $query->execute();

        // récup le dernier Id
        return $db->lastInsertId();
    }
}
