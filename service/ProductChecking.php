<?php

namespace service;
class ProductChecking
{
    protected $productsTxt;

    public function getProductsTxt()
    {
        return $this->productsTxt;
    }


    public function getAllProducts($data)
    {
        $products = $data->getAllProducts();

        $this->productsTxt = array();
        
        foreach ($products as $product) {
            $this->productsTxt[] = array('id' => $product->getId(), 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType());
        }
    }
}