<?php
namespace control;

class Controllers
{

    public function authenticateAction($login, $password, $api, $userCheck)
    {
        return $userCheck->authenticate($login, $password, $api);
    }


    public function productsAction($api, $productChecking)
    {
        $productChecking->getAllProducts($api);
    }

    public function productPageAction($api, $productChecking, $id)
    {
        $productChecking->getProduct($api, $id);
    }

    public function cartPageAction($apiProduct, $apiCart, $productChecking, $cartChecking, $userId)
    {
        $result = $cartChecking->getCart($apiCart, $userId);
        //get the products id from results
        
        
        $productIds = array();
        foreach ($result as $product) {
            $productIds[] = $product['id_product'];
        }
        $productChecking->getCartProduct($apiProduct, $result['id_products']);
    }

    public function createUserAction($api, $userCreation, $mail, $name, $pwd)
    {
        $result = $userCreation->createUser($api, $mail, $name, $pwd);
        return $result;
    }

    public function addToCartAction($api, $cartCreation, $idProduct, $idUser) {
        $result = $cartCreation->addProduct($api, $idProduct, $idUser);
        return $result;
    }

    public function removeFromCartAction($api, $cartCreation, $idProduct, $idUser) {
        $result = $cartCreation->removeProduct($api, $idProduct, $idUser);
        return $result;
    }

     
}