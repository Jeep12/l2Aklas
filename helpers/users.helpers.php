<?php
class UserHelper{
    function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
            
        }
    }
    public function login($user) {

        $_SESSION['USERNAME'] = $user->login;
        $_SESSION['ADMIN']=$user->access_level;
        
    }

    public function checkLoggedIn() {
     
        if (!empty($_SESSION['USERNAME'])) {
           return  true;
            
        }else {
           return  false;

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
