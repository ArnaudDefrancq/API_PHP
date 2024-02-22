<?php

namespace projetApi\Models;

class Users
{
    private $_idUser;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_password;
    private $_adresse;
    private static $_attributes = ["idUser", "nom", "prenom", "email", "password", "adresse"];

    #region 
    public function getIdUser()
    {
        return $this->_idUser;
    }

    public function setIdUser($id)
    {
        $this->_idUser = $id;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * Get the value of _prenom
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * Set the value of _prenom
     *
     * @return  self
     */
    public function setPrenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * Get the value of _password
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
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
    // public function hydrate($data)
    // {
    //     foreach ($data as $key => $value) {
    //         $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
    //         if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
    //         {
    //             $this->$methode($value);
    //         }
    //     }
    // }
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key); // ucfirst met la 1ère lettre en majuscule
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
