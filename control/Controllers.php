<?php
namespace control;

class Controllers
{

    public function authenticateAction($login, $password, $data, $annoncesCheck)
    {
        return $annoncesCheck->authenticate($login, $password, $data);
    }
    public function annoncesAction( $data, $annoncesCheck)
    {
            $annoncesCheck->getAllAnnonces($data);
    }

    public function postAction($id, $data, $annoncesCheck)
    {
        $annoncesCheck->getPost($id, $data);
    }
}