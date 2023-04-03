<?php
namespace control;

class Controllers
{



    public function productsAction($api, $productChecking)
    {
        $productChecking->getAllProducts($api);
    }
}