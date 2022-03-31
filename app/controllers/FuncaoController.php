<?php
require_once dirname(__FILE__)."/../models/FuncaoDAO.class.php";

if($_REQUEST) {
  if(isset($_REQUEST['read'])){
    $dao = new FuncaoDAO();
    $data = $dao->readAll();
    header("Content-Type: application/json");
    echo $data;
  }
}