<?php
namespace App\Models;

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCategories()
    {
        $this->db->query("SELECT * FROM categories");
        $results = $this->db->resultSetArray();
        return $results;
    }
    public function getAllSubCategories($id)
    {
        $this->db->query("SELECT * FROM subcategories
                          WHERE category_id = $id 
                          ");
        $results = $this->db->resultSetArray();
        return $results;
    }


}
