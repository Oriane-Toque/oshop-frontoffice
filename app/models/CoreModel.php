<?php

  class CoreModel
  {
    //=============================================================
    // COMMUN PROPERTIES MODELS
    //=============================================================
    // est accessible dans la classe qu'on a définit mais également
    // dans toute classe qui hérite de cette classe
    protected $id;
    protected $name;
    protected $created_at;
    protected $updated_at;

    //=============================================================
    // COMMUN GETTERS MODELS
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