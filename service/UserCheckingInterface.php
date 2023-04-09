<?php

namespace service;

interface UserCheckingInterface
{
    public function authenticate($name, $pwd);

}