<?php

namespace Toyger\Api\Models;

class Clients
{
    private $_idClient;
    private $_nom;
    private $_email;
    private $_adresse;
    private static $_attributes = ["idClient", "nom", "email", "adresse"];

    #region 
    public function getIdClient()
    {
        return $this->_idClient;
    }

    public function setIdClient($id)
    {
        $this->_idClient = $id;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function setAdresse($adresse)
    {
        $this->_adresse = $adresse;
    }

    /**
     * Get the value of _attributes
     */
    public static function getAttributes()
    {
        return self::$_attributes;
    }

    #endregion

    public function __construct(array $options = [])
    {
        if (!empty($options)) // empty : renvoi vrai si le tableau est vide
        {
            $this->hydrate($options);
        }
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
            if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
            {
                $this->$methode($value);
            }
        }
    }
}
