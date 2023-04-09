<?php

namespace service;

class CartCreation
{
    public function addProduct($api, $idProduct, $idUser)
    {
        $result = $api->addProduct($idProduct, $idUser);
        return $result;
    }

    public function removeProduct($api, $idProduct, $idUser)
    {
        $result = $api->removeProduct($idProduct, $idUser);
        return $result;
    }

}