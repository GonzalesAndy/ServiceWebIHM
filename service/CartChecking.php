<?php

namespace service;
class CartChecking
{
    // permet d'obtenir le panier d'un utilisateur
    public function getCart($api, $userId)
    {
        return ($api->getCart($userId));
    }

}