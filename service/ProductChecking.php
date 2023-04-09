<?php

namespace service;
class ProductChecking
{
    protected $productsTxt;

    // Getters
    public function getProductsTxt()
    {
        return $this->productsTxt;
    }

    // Récupère tous les produits sous frome de tableau
    public function getAllProducts($data)
    {
        $products = $data->getAllProducts();

        $this->productsTxt = array();
        
        foreach ($products as $product) {
            $this->productsTxt[] = array('id' => $product->getId(), 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType(), 'imgPath' => $product->getImgPath());
        }
    }

    // Récupère un produit grâce à son id sous forme de tableau
    public function getProduct($data, $id)
    {
        $product = $data->getProduct($id);

        $this->productsTxt = array('id' => $id, 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType(), 'imgPath' => $product->getImgPath());
    }

    // Récupère les produits du panier grâce à une liste d'id sous forme de tableau
    public function getCartProduct($data, $ids)
    {
        $this->productsTxt = array();
        foreach ($ids as $idProduct) {
            $product = $data->getProduct($idProduct);

            // Permet de savoir si le produit est déjà dans le panier
            $productExists = false;
            for ($i = 0; $i < count($this->productsTxt); $i++) {
                if ($this->productsTxt[$i]['id'] === $idProduct) {
                    //s'il est déjà dans le panier on incrémente sa quantité
                    $this->productsTxt[$i]['quantity']++;
                    $productExists = true;
                    break;
                }
            }
            // Si le produit n'est pas dans le panier on l'ajoute
            if (!$productExists) {
                $this->productsTxt[] = array('id' => $idProduct, 'name' => $product->getName(), 'price' => $product->getPrice(), 'description' => $product->getDescription(), 'stock' => $product->getStock(), 'quantityType' => $product->getQuantityType(), 'quantity' => 1, 'imgPath' => $product->getImgPath());
            }
        }
    }

}