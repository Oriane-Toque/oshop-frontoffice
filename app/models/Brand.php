<?php

// DANS LE CADRE D'ACTIVE RECORD
// - Une classe = une table en DB = une entité en MCD
// - Une propriété de cette classe = un champ de cette table
// - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

// nom de la classe = nom de la table
class Brand
{

  //=============================================================
  // PROPERTIES
  //=============================================================

  // propriétés = lignes de nos tables
  private $id;
  private $name;
  private $footer_order;
  private $created_at;
  private $updated_at;

  //=============================================================
  // METHODS
  //=============================================================

  // TODO méthode qui récupère la marque d'un id donné
  public function find($id)
  {

    $pdo = Database::getPDO();

    $sql = "
      SELECT *
      FROM `brand`
      WHERE `id` = $id
    ";

    $pdoStatment = $pdo->query($sql);
    $result = $pdoStatment->fetchObject('Brand');
    dump($result);
    return $result;
  }

  // TODO méthode qui récupère toutes les marques
  public function findAll()
  {

    $pdo = Database::getPDO();

    $sql = "
      SELECT *
      FROM `brand`
    ";

    $pdoStatment = $pdo->query($sql);
    $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, 'Brand');

    return $result;
  }

  // TODO méthode qui récupére tous les produits d'une marque donnée
  public function findForFooter()
  {

    $pdo = Database::getPDO();

    $sql = "
      SELECT *
      FROM `brand`
      WHERE `footer_order` > 0
      ORDER BY `footer_order`
      ASC
    ";

    $pdoStatment = $pdo->query($sql);
    $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, 'Brand');

    return $result;
  }

  //=============================================================
  // GETTERS
  //=============================================================

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
   * Get the value of footer_order
   */
  public function getFooterOrder()
  {
    return $this->footer_order;
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
