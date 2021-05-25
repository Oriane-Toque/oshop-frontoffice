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
        dump($result);

        // on renvoit le résultat
        return $result;
      }

      public function findAll() {

        // TODO : récupérer toutes les catégories sous la forme d'un tableau d'objets Category
      }
    }