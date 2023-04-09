<?php
namespace data;

class ApiCartCreation {

    public function addProduct($idProduct, $idUser) {
        $url = "http://localhost:8080/cart-1.0-SNAPSHOT/api/carts/".$idUser."/".$idProduct;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        return $result;
    }

    public function removeProduct($idProduct, $idUser) {
        $url = "http://localhost:8080/cart-1.0-SNAPSHOT/api/carts/".$idUser."/".$idProduct;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        return $result;
    }
}