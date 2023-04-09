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
        $this->productsTxt = array();
        foreach ($ids as $idProduct) {
            $product = $data->getProduct($idProduct);

            // Check if the product is already in the array
            $productExists = false;
            for ($i = 0; $i < count($this->productsTxt); $i++) {
                if ($this->productsTxt[$i]['id'] === $idProduct) {
                    // Increase the quantity of the existing product
                    $this->productsTxt[$i]['quantity']++;
                    $productExists = true;
                    break;
                }
            }
            if (!$productExists) {
                $this->productsTxt[] = array('id' => $idProduct, 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType(), 'quantity' => 1);
            }
        }
    }

}