<?php

namespace projetApi\Models;

class Produits
{
    /***Attributs***/
    private $_idProduit;
    private $_nom;
    private $_description;
    private $_prix;
    private $_categorie;
    private static $_attributes = ["idProduit", "nom", "description", "prix", "categorie"];

    /***Accesseur***/
    #region
    /**
     * Get the value of _idProduit
     */
    public function getIdProduit()
    {
        return $this->_idProduit;
    }

    /**
     * Set the value of _idProduit
     *
     * @return  self
     */
    public function setIdProduit($_idProduit)
    {
        $this->_idProduit = $_idProduit;

        return $this;
    }

    /**
     * Get the value of _nom
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */
    public function setNom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _description
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set the value of _description
     *
     * @return  self
     */
    public function setDescription($_description)
    {
        $this->_description = $_description;

        return $this;
    }

    /**
     * Get the value of _prix
     */
    public function getPrix()
    {
        return $this->_prix;
    }

    /**
     * Set the value of _prix
     *
     * @return  self
     */
    public function setPrix($_prix)
    {
        $this->_prix = $_prix;

        return $this;
    }

    /**
     * Get the value of _categorie
     */
    public function getCategorie()
    {
        return $this->_categorie;
    }

    /**
     * Set the value of _categorie
     *
     * @return  self
     */
    public function setCategorie($_categorie)
    {
        $this->_categorie = $_categorie;

        return $this;
    }

    /**
     * Get the value of _attributes
     */
    public static function getAttributes()
    {
        return self::$_attributes;
    }
    #endregion

    /***Construct***/
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
    //         $methode = 'set' . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
    //         if (is_callable([$this, $methode])) // is_callable verifie que la methode existe
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

    /***Methodes***/
}
