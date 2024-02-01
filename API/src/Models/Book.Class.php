<?php
class Book
{
    /***Attributs***/
    private $_idBook;
    private $_title;
    private $_author;
    private $_published_year;
    private $_genre;
    public static $attributs = ["idBook", "title", "author", "published_year", "genre"];

    /***Accesseur***/
    #region
    /**
     * Get the value of _idBook
     */
    public function getiIdBook()
    {
        return $this->_idBook;
    }

    /**
     * Set the value of _idBook
     *
     * @return  self
     */
    public function setIdBook($_idBook)
    {
        $this->_idBook = $_idBook;

        return $this;
    }

    /**
     * Get the value of _title
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Set the value of _title
     *
     * @return  self
     */
    public function setTitle($_title)
    {
        $this->_title = $_title;

        return $this;
    }

    /**
     * Get the value of _author
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * Set the value of _author
     *
     * @return  self
     */
    public function setAuthor($_author)
    {
        $this->_author = $_author;

        return $this;
    }

    /**
     * Get the value of _published_year
     */
    public function getPublished_year()
    {
        return $this->_published_year;
    }

    /**
     * Set the value of _published_year
     *
     * @return  self
     */
    public function setPublished_year($_published_year)
    {
        $this->_published_year = $_published_year;

        return $this;
    }

    /**
     * Get the value of _genre
     */
    public function getGenre()
    {
        return $this->_genre;
    }

    /**
     * Set the value of _genre
     *
     * @return  self
     */
    public function setGenre($_genre)
    {
        $this->_genre = $_genre;

        return $this;
    }
    /**
     * Get the value of attributs
     */
    public static function getAttributs()
    {
        return self::$attributs;
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

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $methode = 'set' . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
            if (is_callable([$this, $methode])) // is_callable verifie que la methode existe
            {
                $this->$methode($value);
            }
        }
    }

    /***Methodes***/
}
