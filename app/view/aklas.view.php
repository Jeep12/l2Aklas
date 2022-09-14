<?php
require_once("libs\smarty\libs\Smarty.class.php");
class AklasView {
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();

    }
    public function renderHome($session,$admin,){
        $isAdmin = false;
        $user = " ";
        if($session){
            $isAdmin = $admin;
            $user = $_SESSION['USERNAME'];


        }
        $this->smarty->assign("admin", $isAdmin);
        $this->smarty->assign("session", $session);

        $this->smarty->assign("user", $user);

        $this->smarty->display("templates\home.tpl");
        

    }

    public function renderShowLogin(){
        $error = false;
        if (!empty($_GET['error'])){
            $error = $_GET['error'];
        }

        $this->smarty->assign("error", $error);

        $this->smarty->display("templates/login.tpl");

    }
    public function renderShowRegister (){
        $error = false;
        if (!empty($_GET['error'])){
            $error = $_GET['error'];
        }

        $this->smarty->assign("error", $error);
        $this->smarty->display("templates/register.tpl");

    }
    public function renderShowDownloads ($session){
        $this->smarty->assign("session", $session);
        $this->smarty->display("templates/downloads.tpl");
    }

    public function renderMyProfile($session,$admin,$characters){
            $name = " ";
        if($session){
            $isAdmin = $admin;
            $name = $_SESSION['USERNAME'];
            $this->smarty->assign("characters", $characters);



        }

        $this->smarty->assign("user", $name);
        
        $this->smarty->assign("admin", $admin);

        $this->smarty->assign("session", $session);
      
        $this->smarty->display("templates/myprofile.tpl");

    }
    public function renderPanelAdmin($session,$admin,$usersTotal,$characters){
        $isAdmin = false;
        if($session){
            $isAdmin = $admin;
            $user = $_SESSION['USERNAME'];
        }
        $this->smarty->assign("admin", $isAdmin);
        $this->smarty->assign("session", $session);
        $this->smarty->assign("user", $user);
        $this->smarty->assign("characters", $characters);


        $this->smarty->assign("usersTotal", $usersTotal);
        $this->smarty->display("templates\panelAdmin.tpl");
    }
    
    
}