<?php

namespace domain;
class User
{
    protected $id;

    protected $mail;

    protected $name;

    protected $pwd;

    public function __construct($id, $mail, $name, $pwd)
    {
        $this->id = $id;
        $this->mail = $mail;
        $this->name = $name;
        $this->pwd = $pwd;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPwd()
    {
        return $this->pwd;
    }
}