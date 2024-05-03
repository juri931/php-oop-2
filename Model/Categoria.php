<?php 

class CategoriaProdotto{
  public $cibo; 
  public $giochi;
  public $cucce;
  public $accessori;

  public function __construct($_cibo, $_giochi, $_cucce, $_accessori)
  {
    $this->cibo = $_cibo;
    $this->giochi = $_giochi;
    $this->cucce = $_cucce;
    $this->accessori = $_accessori;
  }
}