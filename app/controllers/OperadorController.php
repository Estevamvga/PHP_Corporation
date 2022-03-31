<?php
require_once dirname(__FILE__) . "/../models/OperadorDAO.class.php";
require_once dirname(__FILE__) . "/../models/Operador.class.php";

if($_REQUEST) {
  if(isset($_REQUEST['create'])) {
    extract($_REQUEST);
    try {
      $newOp = new Operador($opMatr, $opNome, $opCPF, $opSlr, $opFnc);
      $dao = new OperadorDAO();
      $dao->create($newOp);
      header('Content-Type: application/json');
      echo $newOp->getJSON();
    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
  }

  if(isset($_REQUEST['read'])) {
    try {
      $dao = new OperadorDAO();
      $data['operadores'] = $dao->readAll();
      $data['nextId'] = $dao->nextId();

    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
    header("Content-Type: application/json");
    echo json_encode($data);
  }
}

