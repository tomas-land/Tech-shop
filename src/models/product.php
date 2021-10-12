<?php
namespace App\Models;

class Product {

private $db;

public function __construct(){
    $this->db = new Database;
}

public function getAllProducts(){
    $this->db->query("SELECT * FROM products");
    $results = $this->db->resultSetOBj();
    return $results;

}

}


?>