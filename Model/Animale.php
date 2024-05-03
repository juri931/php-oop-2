<?php 

class Animali {
  public $cane;
  public $gatto;
  public $roditore;
  public $volatile;

  public function __construct(string $_cane, string $_gatto, string $_roditore, string $_volatile) {
    $this->cane = $_cane;
    $this->gatto = $_gatto;
    $this->roditore = $_roditore;
    $this->volatile = $_volatile;
  }
}