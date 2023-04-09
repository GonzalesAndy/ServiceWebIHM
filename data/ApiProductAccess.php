<?php
namespace data;

use domain\{Product};
include_once "domain/Product.php";
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
        
        foreach ($result as $product) {
            $products[] = new Product($product['id_product'], $product['name'], $product['price'], $product['description'], $product['stock'], $product['quantityType'], $product['imgPath']);
        }

        return $products;

    }

    public function getProduct($id) {
        $url = "http://localhost:8080/usersAndProducts-1.0-SNAPSHOT/api/products/" . $id;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
        //for each create a Product.php object
        $result = json_decode($response, true);
        $product = new Product($result['id_product'], $result['name'], $result['price'], $result['description'], $result['stock'], $result['quantityType'], $result['imgPath']);

        return $product;
    }
}
