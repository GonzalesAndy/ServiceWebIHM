<?php

namespace service;
class UserChecking
{
    public function authenticate($name, $password, $api)
    {
        echo "UserChecking::authenticate";
        return ($api->authenticate($name, $password));
    }

}