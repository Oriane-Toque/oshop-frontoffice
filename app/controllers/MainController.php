<?php

  class MainController extends CoreController {

    public function home() {

      $this->show('home');
    }

    public function legal() {

      $this->show('legal');
    }
  }

?>