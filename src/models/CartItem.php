<?php
namespace App\Models;

class CartItem
{
    protected $id;
    protected $brand;
    protected $price;
    protected $image;
    protected $model;

    public function __construct($product_details)
    {
        $this->id = $product_details[0]['id'];
        $this->brand = $product_details[0]['brand'];
        $this->price = $product_details[0]['price'];
        $this->image = $product_details[0]['image'];
        $this->model = $product_details[0]['name'];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getBrand()
    {
        return $this->brand;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getModel()
    {
        return $this->model;
    }
}
