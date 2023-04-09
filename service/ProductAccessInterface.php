<?php

namespace service;

interface ProductAccessInterface
{
    public function getAllProducts();
    public function getProduct($id);

}