<?php
require_once dirname( __FILE__ )."/BaseDAOInterface.class.php";
require_once dirname( __FILE__ )."/Database.lib.php";

abstract class BaseDAO implements BaseDAOInterface {
  protected $dbname;
  protected $tableName;
  protected $valueObj;
  protected $pdo;

  public function __construct() {
    $this->pdo = Database::getInstance()->getDatabase();
    $this->dbname = Database::getInstance()->getDbName();
  }

  public function create(ValueObject $obj) { }

  public function read(int $id) { }

  public function readAll() {
    try {
      $query = "SELECT * FROM {$this->dbname}.{$this->tableName}";
      $stmt = $this->pdo->query($query);
      $stmt->setFetchMode(
        PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
        $this->valueObj
      );
      $data = [];
      foreach($stmt->fetchAll() as $obj) {
        array_push($data, $obj->getJSON());
      }
      return json_encode($data);
    } catch (PDOException $e) {
      echo "Erro na consulta: ", $e->getMessage();
      var_dump($e);
    }
  }
}