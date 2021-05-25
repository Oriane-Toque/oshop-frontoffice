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
  }