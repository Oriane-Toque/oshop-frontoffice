<?php

    // nom de la classe = nom de la table
    class Category {

      // propriétés = lignes de nos tables
      private $id;
      private $name;
      private $subtitle;
      private $pîcture;
      private $home_order;
      private $created_at;
      private $updated_at;

      // methode qui va intéragir avec la BDD
      // fait un objet qui représente la ligne dans la BDD
      public function find($id) {

        // TODO : récupérer la catégorie #x sous la forme d'objet Category
        // on récupère notre objet PDO, la connexion à la DB
        $pdo = Database::getPDO();

        // on récupère la catégorie correspondant à l'id
        $sql = "
          SELECT *
          FROM `category`
          WHERE `id` = $id
        ";

        // execution de la requête
        $pdoStatement = $pdo->query($sql);
        // récupération du résultat sous la forme d'un tableau assiocatif
        $result = $pdoStatement->fetchObject('Category');
        /* dump($result); */
        
        // on renvoit le résultat
        return $result;
      }

      public function findAll() {

        // TODO : récupérer toutes les catégories sous la forme d'un tableau d'objets Category
        $pdo = Database::getPDO();

        $sql = "
          SELECT *
          FROM `category`
        ";

        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'category');
        /* dump($result); */

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
      public function getCreatedAt()
      {
            return $this->created_at;
      }

      /**
       * Get the value of home_order
       */ 
      public function getHomeOrder()
      {
            return $this->home_order;
      }

      /**
       * Get the value of pîcture
       */ 
      public function getPîcture()
      {
            return $this->pîcture;
      }

      /**
       * Get the value of subtitle
       */ 
      public function getSubtitle()
      {
            return $this->subtitle;
      }

      /**
       * Get the value of id
       */ 
      public function getId()
      {
            return $this->id;
      }

      /**
       * Get the value of name
       */ 
      public function getName()
      {
            return $this->name;
      }
    }