<?php

namespace service;

interface CartCreationInterface
{
    public function addProduct($idProduct, $idUser);
    public function removeProduct($idProduct, $idUser);
}