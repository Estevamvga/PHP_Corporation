<?php
require_once dirname( __FILE__ )."/BaseDAO.class.php";
require_once dirname( __FILE__ )."/OperadorDAOInterface.class.php";
require_once dirname( __FILE__ )."/Operador.class.php";
require_once dirname( __FILE__ )."/Database.lib.php";

class OperadorDAO extends BaseDAO implements OperadorDAOInterface {
  protected $tableName = "Operadores";
  protected $valueObj = "Operador";

  public function __construct() {
    parent::__construct();
  }

  public function create(ValueObject $op) {
    $query = "INSERT INTO {$this->dbname}.{$this->tableName} VALUES (?, ?, ?, ?, ?)";
    // TODO: Colocar a chamada em um try-catch
    $stmt = $this->pdo->prepare($query)->execute($op->toArray());
  }

  public function read(int $id) {

  }

  public function update(ValueObject $op) {

  }

  public function delete(ValueObject $op) {

  }

  public function countOperadores() {

  }

  public function nextId() {
    $query = "SELECT matricula FROM {$this->dbname}.{$this->tableName} ORDER BY matricula DESC LIMIT 1";
    $stmt = $this->pdo->query($query);
    $num = $stmt->fetch();
    if(!$num) {
      return 1;
    } else {
      return $num[0] + 1;
    }
  }
}
