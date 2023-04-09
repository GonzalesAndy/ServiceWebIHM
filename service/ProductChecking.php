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

    public function getProduct($data, $id)
    {
        $product = $data->getProduct($id);

        $this->productsTxt = array('id' => $id, 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType());
    }

    public function getCartProduct($data, $ids)
    {
        //id is an array

        $this->productsTxt = array();
        foreach ($ids as $idProduct) {
            $product = $data->getProduct($idProduct);
            $this->productsTxt[] = array('id' => $idProduct, 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType());
        }
    }
}