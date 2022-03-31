<?php
class Database {
  private static $instance = null;
  private $pdo = null;
  private $dbname = "phpcorp";
  private $user = "php";
  private $password = "phpmyadmin";

  private function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:localhost;dbname=$this->dbname",
        $this->user,
        $this->password
      );
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Erro na conexão ao database: " . $e->getMessage();
    }
  }

  function __destruct() {
    $this->pdo = null;
  }

  public static function getInstance() {
    if(!isset(self::$instance)) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getDatabase() {
    return $this->pdo;
  }

  public function getDbName() {
    return $this->dbname;
  }
}