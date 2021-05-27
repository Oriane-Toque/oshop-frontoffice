<?php
  namespace app\models;

  use \app\utils\Database;
  use \PDO;

  // DANS LE CADRE D'ACTIVE RECORD
  // - Une classe = une table en DB = une entité en MCD
  // - Une propriété de cette classe = un champ de cette table
  // - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

  // nom de la classe = nom de la table
  class Type extends CoreModel
  {

    //=============================================================
    // PROPERTIES
    //=============================================================

    // propriétés = lignes de nos tables
    private $footer_order;

    //=============================================================
    // METHODS
    //=============================================================

    // TODO méthode qui récupère la marque d'un id donné
    public function find($id)
    {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `type`
        WHERE `id` = $id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchObject('Type');
      dump($result);
      return $result;
    }

    // TODO méthode qui récupère toutes les marques
    public function findAll()
    {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `type`
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Type');

      return $result;
    }

    // TODO méthode qui récupére tous les produits d'une marque donnée
    public function findForFooter()
    {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `type`
        WHERE `footer_order` > 0
        ORDER BY `footer_order`
        ASC
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS, '\app\models\Type');

      return $result;
    }

    //=============================================================
    // GETTERS
    //=============================================================

    /**
     * Get the value of footer_order
     */
    public function getFooterOrder()
    {
      return $this->footer_order;
    }
}
