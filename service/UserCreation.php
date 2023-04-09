<?php

namespace service;

class UserCreation
{
    //Permet de créer un utilisateur
    public function createUser($data, $mail, $name, $pwd)
    {
        $result = $data->createUser($mail, $name, $pwd);
        return $result;
    }

}