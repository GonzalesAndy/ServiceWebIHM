<?php
namespace data;

class ApiCartAccess {

    public function getCart($userId) {
        $url = "http://localhost:8080/cart-1.0-SNAPSHOT/api/carts/".$userId;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $cart = array();
        $cart = json_decode($curl_response, true);
        return $cart;
    }

}