<?php
  namespace app\models;

  use \app\utils\Database;
  use \PDO;

  // DANS LE CADRE D'ACTIVE RECORD
  // - Une classe = une table en DB = une entité en MCD
  // - Une propriété de cette classe = un champ de cette table
  // - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

  // nom de la classe = nom de la table
  class Product extends CoreModel
  {

    //=============================================================
    // PROPERTIES
    //=============================================================

    // propriétés = lignes de nos tables
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    //=============================================================
    // METHODS
    //=============================================================

    // TODO méthode qui récupère le produit d'un id donné
    public function find($id)
    {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `id` = $id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchObject('\app\models\Product');

      return $result;
    }

    // TODO méthode qui récupère toutes les produits
    public function findAll()
    {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }

    // TODO méthode qui retourne tous les produits d'une catégorie
    public function findByCategory($category_id)
    {
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `category_id` = $category_id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }

    // TODO méthode qui retourne tous les produits d'un type
    public function findByType($type_id)
    {
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `type_id` = $type_id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }

    // TODO méthode qui retourne tous les produits d'une marque
    public function findByBrand($brand_id)
    {
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `brand_id` = $brand_id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }

    // TODO méthode qui retourne tous les produits d'une catégorie, triés par nom
    public function findByCategoryOrderName($category_id)
    {
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `category_id` = $category_id
        ORDER BY `name`
        ASC
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }

    // TODO méthode qui retourne tous les produits d'une catégorie, triés par prix

    public function findByCategoryOrderPrice($category_id)
    {
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `category_id` = $category_id
        ORDER BY `price`
        ASC
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }

    // TODO méthode qui retourne tous les produits d'une catégorie, triés par note

    public function findByCategoryOrderRate($category_id)
    {
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        WHERE `category_id` = $category_id
        ORDER BY `rate`
        ASC
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Product');

      return $result;
    }
    //=============================================================
    // GETTERS
    //=============================================================

    /**
     * Get the value of type_id
     */
    public function getTypeId()
    {
      return $this->type_id;
    }

    /**
     * Get the value of category_id
     */
    public function getCategoryId()
    {
      return $this->category_id;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrandId()
    {
      return $this->brand_id;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
      return $this->rate;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
      return $this->price;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
      return $this->picture;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
      return $this->description;
    }
}
