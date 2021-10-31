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
public function getAllProductsBySubcategory($subcategory_id){
    $this->db->query("SELECT * FROM products WHERE subcategory_id = :subcategory_id");
    $this->db->bind(':subcategory_id', $subcategory_id);
    $results = $this->db->resultSetOBj();
    return $results;
  
}
public function getProductByID($product_id){
    $this->db->query("SELECT id,brand,price FROM products WHERE id = :product_id");
    $this->db->bind(':product_id', $product_id);
    $results = $this->db->resultSetArray();
    return $results;
  
}
}


?>