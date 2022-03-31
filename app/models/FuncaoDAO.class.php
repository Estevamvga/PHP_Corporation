<?php
require_once dirname( __FILE__ )."/BaseDAO.class.php";
require_once dirname( __FILE__ )."/FuncaoDAOInterface.class.php";
require_once dirname(__FILE__)."/Funcao.class.php";

class FuncaoDAO extends BaseDAO implements FuncaoDAOInterface {
  protected $tableName = "Funcoes";
  protected $valueObj = "Funcao";

  public function __construct() {
    parent::__construct();
  }

  public function create(ValueObject $fn) { }

  public function read(int $id) { }

  public function update(ValueObject $fn) { }

  public function delete(ValueObject $fn) { }
}