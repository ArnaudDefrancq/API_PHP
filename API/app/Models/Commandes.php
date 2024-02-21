<?php

namespace Toyger\Api\Models;

class Commandes
{
    /***Attributs***/
    private $_idCommande;
    private $_id_client;
    private $_id_produit;
    private $_quantite;
    private static $_attributes = ["idCommande", "id_client", "id_produit", "quantite"];

    /***Accesseur***/
    #region
    /**
     * Get the value of _idCommande
     */
    public function getIdCommande()
    {
        return $this->_idCommande;
    }

    /**
     * Set the value of _idCommande
     *
     * @return  self
     */
    public function setIdCommande($_idCommande)
    {
        $this->_idCommande = $_idCommande;

        return $this;
    }

    /**
     * Get the value of _idClient
     */
    public function getId_client()
    {
        return $this->_id_client;
    }

    /**
     * Set the value of _idClient
     *
     * @return  self
     */
    public function setId_client($_idClient)
    {
        $this->_id_client = $_idClient;

        return $this;
    }

    /**
     * Get the value of _idProduit
     */
    public function getId_produit()
    {
        return $this->_id_produit;
    }

    /**
     * Set the value of _idProduit
     *
     * @return  self
     */
    public function setId_produit($_idProduit)
    {
        $this->_id_produit = $_idProduit;

        return $this;
    }

    /**
     * Get the value of _quantite
     */
    public function getQuantite()
    {
        return $this->_quantite;
    }

    /**
     * Set the value of _quantite
     *
     * @return  self
     */
    public function setQuantite($_quantite)
    {
        $this->_quantite = $_quantite;

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
