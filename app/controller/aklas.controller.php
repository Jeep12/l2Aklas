<?php 
require_once("app/view/aklas.view.php");
require_once("app/model/user.model.php");
require_once("helpers/users.helpers.php");
class AklasController {

    private $view;
    private $modelUser;
    private $userHelper;
   


    public function __construct()
    {
        $this->view = new AklasView();
        $this->modelUser = new UserModel();
        $this->userHelper = new UserHelper();

    }


    public function showHome(){   
        $session = $this->userHelper->checkLoggedIn();
        $admin = $this->userHelper->isAdmin();
      
        $this->view->renderHome($session,$admin);
    }

 
    public function showLogin(){
        $session = $this->userHelper->checkLoggedIn();
        $this->view->renderShowLogin($session);
    }   


    public function showRegister (){
        $this->view->renderShowRegister();
    }


    public function showDownloads(){
        $session = $this->userHelper->checkLoggedIn();
        $this->view->renderShowDownloads($session);
    }


    public function showMyProfile(){
        $session = $this->userHelper->checkLoggedIn();
        if ($session == true){
            $admin = $this->userHelper->isAdmin();
            $characters = $this->modelUser->getPjs($_SESSION['USERNAME']);

    
            $this->view->renderMyProfile($session,$admin,$characters);
        }else {
            header("Location:" . BASE_URL  );

        }
    }
    public function showPanelAdmin(){
        $session = $this->userHelper->checkLoggedIn();
        $admin = $this->userHelper->isAdmin();
        if ($admin == true && $session == true){
            $usersTotal = $this->modelUser->getAccounts();
            $characters = $this->modelUser->getPjs($_SESSION['USERNAME']);
        
            $this->view->renderPanelAdmin($session,$admin,$usersTotal,$characters);
        }else {
            header("Location:" . BASE_URL  );
        }
    }
    public function pruebas (){
        $char = 268478206;
        $armors = $this->modelUser->armor($char);
        $weapons = $this->modelUser->weapon($char);
        $miscs = $this->modelUser->misc($char);
        $inventario  = array_merge($armors,$weapons,$miscs);
        print_r($inventario);
        die;
        echo "<pre>";
        echo "Inventario: <br>";
        print_r($inventario);
        echo "</pre>";

        die;
        echo "<pre>";
        echo "Armaduras: <br>";
        print_r($armors);
        echo "</pre>";
        echo "<pre>";
        echo "Armas: <br>";
        print_r($weapons);
        echo "</pre>";
        echo "<pre>";
        echo "Misc: <br>";
        print_r($miscs);
        echo "</pre>";
        die;
    
        echo "<h1 style='text-align:center;'>Pruebas de consultas</h1> <br>";
        echo "<div style='width:80%;background:green;margin:auto;'>";
        $pj = $this->modelUser->getPj("Aklas");
        echo "<pre>";
        var_dump($pj);
        echo "</pre>";
        echo "__________________________________________________________________________<br>";
        echo "Id pj: " . $pj->obj_Id;
        $inv = $this->modelUser->getInventario($pj->obj_Id);
        echo " <br>Inventario:";
        echo "<pre>";
        var_dump($inv);
        echo "</pre>";
        

            


        echo "</div";
    }
    
}