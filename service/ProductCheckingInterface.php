<?php

namespace service;

interface ProductCheckingInterface
{
    public function getAllProducts();
    public function getProduct($id);

}