<?php
namespace data;

use domain\{User};
use service\UserCreationInterface;
include_once "domain/User.php";
include_once "service/UserCreationInterface.php";
class ApiUserCreation implements UserCreationInterface {

    //Permet de créer un utilisateur
    public function createUser($mail, $name, $pwd) {
        //Regarde si le nom d'utilisateur est déjà pris
        $urlCheck = "http://localhost:8080/user-1.0-SNAPSHOT/api/users/";

        $chCheck = curl_init($urlCheck);

        curl_setopt($chCheck, CURLOPT_RETURNTRANSFER, true);

        $responseCheck = curl_exec($chCheck);

        curl_close($chCheck);

        $resultCheck = json_decode($responseCheck, true);
        //renvoie false s'il est déjà pris
        foreach ($resultCheck as $user) {
            if ($user['name'] == $name) {
                return false;
            }
        }
        
        
        //Crée l'utilisateur
        $url = "http://localhost:8080/user-1.0-SNAPSHOT/api/users";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "mail=" . $mail . "&name=" . $name . "&pwd=" . $pwd);

        $response = curl_exec($ch);

        curl_close($ch);
        //Crée l'utilisateur en local
        $result = json_decode($response, true);
        $user = new User($result['id'], $result['mail'], $result['name'], $result['pwd']);
        //Renvoie "User created" si tout s'est bien passé
        return "User created";
    }

    
}