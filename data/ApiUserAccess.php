<?php
namespace data;

use domain\{User};
include_once "domain/User.php";
class ApiUserAccess {

    public function authenticate($name, $pwd) {
        $url = "http://".$name.":".$pwd."@localhost:8080/user-1.0-SNAPSHOT/api/authenticate";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);


        if($result != null) {
            $url =  "http://localhost:8080/user-1.0-SNAPSHOT/api/users/";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $response = curl_exec($ch);
            curl_close($ch);
            $users = json_decode($response, true);
            $user = null;
            foreach ($users as $u) {
                if ($u['name'] == $name) {
                    $user = $u;
                    break;
                }
            }
            if ($user != null) {
                return $user['id'];
            }
        }
        return false;
    }
}