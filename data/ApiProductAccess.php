<?php
namespace data;



use domain\{Product};
use service\ProductCheckingInterface;
include_once "domain/Product.php";
include_once "service/ProductCheckingInterface.php";
class ApiProductAccess implements ProductCheckingInterface {

    //Permet de récupérer tous les produits
    public function getAllProducts() {
        //Récupère tous les produits
        $url = "http://localhost:8080/usersAndProducts-1.0-SNAPSHOT/api/products";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
        //for each create a Product.php object
        $result = json_decode($response, true);
        $products = array();
        //récupère les produits dans un tableau
        foreach ($result as $product) {
            $products[] = new Product($product['id_product'], $product['name'], $product['price'], $product['description'], $product['stock'], $product['quantityType'], $product['imgPath']);
        }

        //Renvoie le tableau de produits
        return $products;

    }

    //Permet de récupérer un produit grâce à son id
    public function getProduct($id) {
        //Récupère le produit grâce à son id depuis l'api
        $url = "http://localhost:8080/usersAndProducts-1.0-SNAPSHOT/api/products/" . $id;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
        $result = json_decode($response, true);
        //Renvoie le produit sous forme d'objet
        $product = new Product($result['id_product'], $result['name'], $result['price'], $result['description'], $result['stock'], $result['quantityType'], $result['imgPath']);

        return $product;
    }
}
