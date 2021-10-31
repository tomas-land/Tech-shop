<?php
namespace App\Models;

class CartItem {

   // Item attributes are all protected:
	protected $id;
	protected $name;
	protected $price;
	protected $qty;
	
	// Constructor populates the attributes:
	public function __construct($product_id)	{
		// $this->id = $product_details[0]['id'];
		// $this->name = $product_details[0]['brand'];
		// $this->price = $product_details[0]['price'];
		// $this->qty = $qty;
		$this->id = $product_id;
	}
	
	// Method that returns the ID:
	public function getId()	{
		return $this->id;
	}

	// Method that returns the name:
	public function getName() {
		return $this->name;
	}

	// Method that returns the price:
	public function getPrice() {
		return $this->price;
	}
}