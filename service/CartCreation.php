<?php

namespace service;

class CartCreation
{
    //ajoute un produit au panier
    public function addProduct($api, $idProduct, $idUser)
    {
        $result = $api->addProduct($idProduct, $idUser);
        return $result;
    }

    //supprime un produit du panier
    public function removeProduct($api, $idProduct, $idUser)
    {
        $result = $api->removeProduct($idProduct, $idUser);
        return $result;
    }

}