<?php
namespace data;

include_once 'service/CartCreationInterface.php';
use service\CartCreationInterface;

class ApiCartCreation implements CartCreationInterface{

    // permet d'ajouter un produit au panier d'un utilisateur
    public function addProduct($idProduct, $idUser) {
        //Ajoute un produit au panier grâce à l'api
        $url = "http://localhost:8080/cart-1.0-SNAPSHOT/api/carts/".$idUser."/".$idProduct;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        //Renvoie le résultat de l'ajout
        return $result;
    }

    // permet de supprimer un produit du panier d'un utilisateur
    public function removeProduct($idProduct, $idUser) {
        //Supprime un produit du panier grâce à l'api
        $url = "http://localhost:8080/cart-1.0-SNAPSHOT/api/carts/".$idUser."/".$idProduct;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        //Renvoie le résultat de la suppression
        return $result;
    }
}