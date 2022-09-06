<?php
require_once("vendor/autoload.php");
use Firebase\JWT\JWT;
class UserHelper{
    function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
            
        }
    }
    public function login($user) {


        $_SESSION['USERNAME'] = $user->login;
        $_SESSION['ADMIN']=$user->access_level;
        $_SESSION['TOKEN'] = $this->jwt($user->login,$user->email);
        
    }
    
    private function jwt ($login,$email){
        $key = "l2aklas";
        $time = time();
        $token = array(
         "iat"=>$time,
         "exp"=>$time + (60),
         "data"=>[
           "account"=>$login,
           "email"=>$email
         ]);
         $jwt = JWT::encode( $token,$key,'HS256');
        return $jwt;
       }

    public function checkLoggedIn() {
     
        if (!empty($_SESSION['USERNAME'])) {
           return  true;
            
        }else {
           return  false;

        }
    }
    public function getToken(){
        if (!empty($_SESSION['TOKEN'])) {
            return  $_SESSION['TOKEN'];
        }
    }

    public function isAdmin(){
        $admin = false;
        if ($this->checkLoggedIn()){
            if ($_SESSION['ADMIN'] == 1){
                $admin = true;
            }
        }
        return $admin;
    }
    function logout() {
      
        session_destroy();
    } 
}
