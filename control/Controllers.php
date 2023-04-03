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
}