<?php
namespace control;

class Controllers
{

    public function authenticateAction($login, $password, $data, $annoncesCheck)
    {
        return $annoncesCheck->authenticate($login, $password, $data);
    }


    public function productsAction($api, $productChecking)
    {
        $productChecking->getAllProducts($api);
    }

    public function productPageAction($api, $productChecking, $id)
    {
        $productChecking->getProduct($api, $id);
    }

    public function createUserAction($api, $userCreation, $mail, $name, $pwd)
    {
        $result = $userCreation->createUser($api, $mail, $name, $pwd);
        return $result;
    }
}