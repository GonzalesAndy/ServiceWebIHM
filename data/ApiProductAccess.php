<?php

namespace data;

use domain\Product;

class ApiProductAccess {

    public function getAllProducts() {
        $url = "http://localhost:8080/usersAndProducts-1.0-SNAPSHOT/api/products";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
        //for each create a Product.php object
        $result = json_decode($response, true);
        $products = array();
        
        $product1 = new Product(1, "Pomme", 1.5, "Une pomme", 10, "kg");
        $product2 = new Product(2, "Poire", 1.5, "Une poire", 10, "kg");
        $product3 = new Product(3, "Banane", 1.5, "Une banane", 10, "kg");

        $products[] = $product1;
        return $products;

    }
}
