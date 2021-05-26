<?php

// DANS LE CADRE D'ACTIVE RECORD
// - Une classe = une table en DB = une entité en MCD
// - Une propriété de cette classe = un champ de cette table
// - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

// nom de la classe = nom de la table
class Product
{

  //=============================================================
  // PROPERTIES
  //=============================================================

  // propriétés = lignes de nos tables
  private $id;
  private $name;
  private $description;
  private $picture;
  private $price;
  private $rate;
  private $status;
  private $created_at;
  private $updated_at;
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
    $result = $pdoStatment->fetchObject('Product');
    dump($result);
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
    $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, 'Product');

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
    $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, 'Product');

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
   * Get the value of updated_at
   */
  public function getUpdatedAt()
  {
    return $this->updated_at;
  }

  /**
   * Get the value of created_at
   */
  public function createdAt()
  {
    return $this->created_at;
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

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }
}
