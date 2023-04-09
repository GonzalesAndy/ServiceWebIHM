<?php
namespace data;

use domain\{User};
use service\UserCheckingInterface;
include_once "service/UserCheckingInterface.php";
include_once "domain/User.php";
class ApiUserAccess implements UserCheckingInterface {

    //Permet de vérifier si le mot de passe et le nom correspondent à un compte
    public function authenticate($name, $pwd) {
        //Fait appel à l'api pour vérifier si le nom et le mot de passe correspondent à un compte
        $url = "http://".$name.":".$pwd."@localhost:8080/user-1.0-SNAPSHOT/api/authenticate";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);

        //Si le nom et le mot de passe correspondent à un compte, renvoie l'id de l'utilisateur
        if($result != null) {
            $url =  "http://localhost:8080/user-1.0-SNAPSHOT/api/users/";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $response = curl_exec($ch);
            curl_close($ch);
            $users = json_decode($response, true);
            $user = null;
            //Récupère l'id de l'utilisateur
            foreach ($users as $u) {
                if ($u['name'] == $name) {
                    $user = $u;
                    break;
                }
            }
            //Renvoie l'id de l'utilisateur
            if ($user != null) {
                return $user['id'];
            }
        }
        //Sinon renvoie false
        return false;
    }
}