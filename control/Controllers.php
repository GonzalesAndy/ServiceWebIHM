<?php
namespace control;

class Controllers
{

    //Permet de gérer l'authentification tout en gardant des frontières
    public function authenticateAction($login, $password, $api, $userCheck)
    {
        return $userCheck->authenticate($login, $password, $api);
    }


    //Permet de gérer l'affichage de tous les produits
    public function productsAction($api, $productChecking)
    {
        $productChecking->getAllProducts($api);
    }

    //Permet de gérer l'affichage d'un produit
    public function productPageAction($api, $productChecking, $id)
    {
        $productChecking->getProduct($api, $id);
    }

    //Permet de gérer l'affichage du panier
    public function cartPageAction($apiProduct, $apiCart, $productChecking, $cartChecking, $userId)
    {
        $result = $cartChecking->getCart($apiCart, $userId); //Renvoie le panier de l'utilisateur
        //get the products id from results
        
        
        $productIds = array(); //Tableau qui contiendra les id des produits
        //Récupère les id de chaque produit
        foreach ($result as $product) {
            $productIds[] = $product['id_product'];
        }
        //Récupère les produits grâce à leurs id
        $productChecking->getCartProduct($apiProduct, $productIds);
    }

    //Permet de gérer la création d'un utilisateur
    public function createUserAction($api, $userCreation, $mail, $name, $pwd)
    {
        $result = $userCreation->createUser($api, $mail, $name, $pwd);
        return $result;
    }

    //Permet de gérer l'ajout d'un article au panier
    public function addToCartAction($api, $cartCreation, $idProduct, $idUser) {
        $result = $cartCreation->addProduct($api, $idProduct, $idUser);
        return $result;
    }

    //Permet de gérer la suppression d'un article du panier
    public function removeFromCartAction($api, $cartCreation, $idProduct, $idUser) {
        $result = $cartCreation->removeProduct($api, $idProduct, $idUser);
        return $result;
    }

     
}