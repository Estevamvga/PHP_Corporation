<?php
abstract class ValueObject {
  public function getJSON() {
    return json_encode(get_object_vars($this));
  }

  abstract function toArray();
}