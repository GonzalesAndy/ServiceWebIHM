<?php

namespace domain;

class Product {

    protected $id;
    protected $name;
    protected $price;
    protected $description;
    protected $stock;
    protected $quantityType;

    public function __construct($id, $name, $price, $description, $stock, $quantityType) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->stock = $stock;
        $this->quantityType = $quantityType;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getQuantityType() {
        return $this->quantityType;
    }
}