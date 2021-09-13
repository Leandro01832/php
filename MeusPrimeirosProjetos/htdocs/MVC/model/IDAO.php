<?php

require_once 'modelocrud.php';
interface IDAO {
    public function insert(modelocrud $value);
    public function update(modelocrud $value);
    public function delete(modelocrud $value);
    public function getbyid($id);
    public function getAll();
}
