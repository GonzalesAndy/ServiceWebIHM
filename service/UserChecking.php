<?php

namespace service;
class UserChecking
{
    //Renvoie l'id si l'utilisateur existe, false sinon
    public function authenticate($name, $password, $api)
    {
        return ($api->authenticate($name, $password));
    }

}