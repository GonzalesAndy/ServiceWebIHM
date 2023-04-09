<?php

namespace service;
class CartChecking
{
    public function getCart($api, $userId)
    {
        return ($api->getCart($userId));
    }

}