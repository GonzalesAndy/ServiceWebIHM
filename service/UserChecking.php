<?php

namespace service;
class UserChecking
{
    public function authenticate($name, $password, $api)
    {
        return ($api->authenticate($name, $password));
    }

}