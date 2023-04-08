<?php

namespace service;

interface UserCreationInterface
{
    public function createUser($mail, $name, $pwd);

}