<?php
class Parametre
{
    /***Attributs***/
    static private $_host;
    static private $_port;
    static private $_dbName;
    static private $_username;
    static private $_password;
    static private $_bdd;

    /***Accesseur***/
    #region
    static public function getBdd()
    {
        return self::$_bdd;
    }

    static public function setBdd($bdd)
    {
        self::$_bdd = $bdd;
    }

    static public function getPassword()
    {
        return self::$_password;
    }

    static public function setPassword($password)
    {
        self::$_password = $password;
    }

    static public function getUsername()
    {
        return self::$_username;
    }

    static public function setUsername($username)
    {
        self::$_username = $username;
    }

    static public function getDbName()
    {
        return self::$_dbName;
    }

    static public function setDbName($dbName)
    {
        self::$_dbName = $dbName;
    }

    static public function getPort()
    {
        return self::$_port;
    }

    static public function setPort($port)
    {
        self::$_port = $port;
    }

    static public function getHost()
    {
        return self::$_host;
    }

    static public function setHost($host)
    {
        self::$_host = $host;
    }

    #endregion

    /***Methodes***/

    static public function getConfig()
    {
        $fichier = file_get_contents("config.json");

        if ($fichier) {

            $jsonData = json_decode($fichier, true);

            foreach ($jsonData["database"] as $key => $value) {
                if ($key == "host") self::setHost($value);
                if ($key == "port") self::setPort($value);
                if ($key == "dbname") self::setDbName($value);
                if ($key == "username") self::setUsername($value);
                if ($key == "password") self::setPassword($value);
                if ($key == "bdd") self::setBdd($value);
            }
        } else {
            var_dump('probleme fichier');
        }
    }
}
