<?php

namespace service;

class UserCreation
{
    public function createUser($data, $mail, $name, $pwd)
    {
        $result = $data->createUser($mail, $name, $pwd);
        return $result;
    }

}