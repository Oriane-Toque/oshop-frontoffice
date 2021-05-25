<?php

  // DANS LE CADRE D'ACTIVE RECORD
  // - Une classe = une table en DB = une entité en MCD
  // - Une propriété de cette classe = un champ de cette table
  // - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

  // nom de la classe = nom de la table
  class Brand {

    // propriétés = lignes de nos tables
    private $id;
    private $name;
    private $footer_order;
    private $created_at;
    private $updated_at;

    // TODO méthode qui récupère la marque d'un id donné
    public function find($id) {
      
      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `brand`
        WHERE `id` = $id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchObject('brand');
      dump($result);
      return $result;
    }

    // TODO méthode qui récupère toutes les marques
    public function findAll() {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `brand`
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS);

      return $result;
    }

    // TODO méthode qui récupére tous les produits d'une marque donnée
    public function productBrand($id) {

      $pdo = Database::getPDO();

      $sql = "
        SELECT *
        FROM `product`
        INNER JOIN `brand`
        ON `product`.`brand_id` = `brand`.`id`
        WHERE `brand_id` = $id
      ";

      $pdoStatment = $pdo->query($sql);
      $result = $pdoStatment->fetchAll(PDO::FETCH_CLASS);

      return $result;
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