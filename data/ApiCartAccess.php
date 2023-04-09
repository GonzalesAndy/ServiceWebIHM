<?php
namespace data;
use service\CartCheckingInterface;
include_once 'service/CartCheckingInterface.php';
class ApiCartAccess  implements CartCheckingInterface {

    // permet d'obtenir le panier d'un utilisateur
    public function getCart($userId) {
        //Récupère le panier grâce à l'api
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
        //Renvoie le panier
        return $cart;
    }

}