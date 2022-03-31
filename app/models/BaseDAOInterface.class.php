<?php
interface BaseDAOInterface {
  function create(ValueObject $obj);
  function read(int $id);
  function update(ValueObject $obj);
  function delete(ValueObject $obj);
}