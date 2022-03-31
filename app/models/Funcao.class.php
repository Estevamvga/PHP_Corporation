<?php
require_once dirname( __FILE__ )."/ValueObject.class.php";

class Funcao extends ValueObject {
  protected $cod;
  protected $descricao;

  public function toArray() {
    return get_object_vars($this);
  }
}