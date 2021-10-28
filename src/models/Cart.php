<?php

namespace App\Models;

class Cart
{

    private $quantity;
    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }
    public function addItems()
    {
        echo 'added';
    }
}
