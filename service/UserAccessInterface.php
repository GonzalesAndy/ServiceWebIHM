<?php

namespace service;

interface UserAccessInterface
{
    public function authenticate($name, $pwd);

}