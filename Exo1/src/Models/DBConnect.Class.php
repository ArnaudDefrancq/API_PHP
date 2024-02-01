<?php
class DbConnect
{
    private static $_db;

    public static function getDb()
    {
        return self::$_db;
    }

    public static function init()
    {

        try {
            self::$_db = new PDO(Parametre::getBdd() . ":host=" . Parametre::getHost() . ";port=" . Parametre::getPort() . ";dbname=" . Parametre::getDbName() . ";charset=utf8", Parametre::getUsername(), Parametre::getPassword());
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
