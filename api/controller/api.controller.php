<?php
require_once("app/model/user.model.php");
require_once("api/view/api-view.php");
require_once("helpers/users.helpers.php");
require_once("vendor/autoload.php");

use Firebase\JWT\JWT;

class ApiAklasController
{
    private $User;
    private $view;
    private $data;
    private $UserHelper;
    private $token;

    public function __construct()
    {
        $this->UserHelper = new UserHelper();
        $this->User = new UserModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    private function tokenSV()
    {
        if (isset($_SESSION['TOKEN'])) {
            $this->token = $_SESSION['TOKEN'];
            return true;
        } else {
            return false;
        }
    }
    public function get_data()
    {
        return json_decode($this->data);
    }
    public function getAllPjs($params)
    {

        $id = $params[':ID'];

        $search = $this->User->getPjs($id);
        if ($search) {
            $this->view->response($search, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }

    public function getPj($params)
    {
        $char = $params[':ID'];

        $search = $this->User->getPj($char);
        if ($search) {
            $this->view->response($search, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }
    public function addNoticia()
    {

        $comment = $this->get_data();
        $sendOk = $this->User->addNoticia($comment->mensaje, $comment->fecha, $comment->autor);

        if ($sendOk) {
            $this->view->response("Se insertó correctamente", 200);
        } else {
            $this->view->response("Hubo un error", 500);
        }
    }
    public function getAllNoticias()
    {
        $search = $this->User->getAllNoticias();

        if ($search) {
            $this->view->response($search, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }
    public function getBaseClass($params)
    {
        $class = $params[':ID'];
        $response = $this->User->getBaseClass($class);
        if ($response) {
            $this->view->response($response, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }
    public function getClan($params)
    {
        $clan = $params[':ID'];

        $response = $this->User->getClan($clan);

        if ($response) {
            $this->view->response($response, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }
    public function getInv($params)
    {
        $char = $params[':ID'];

        $armor = $this->User->armor($char);
        $weapon = $this->User->weapon($char);
        $misc = $this->User->misc($char);
        $inventario  = array_merge($armor, $weapon, $misc);
        if ($inventario) {
            $this->view->response($inventario, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }
    public function getFriends(){
        if(!empty($_SESSION['USERNAME'])){
            $pjs = $this->User->getPjs($_SESSION['USERNAME']);
            $aux = array();
            //recorrer todos los pjs de la cuenta para traer todos los amigos
            for ($i = 0; $i<count($pjs);$i++){
                $friends = $this->User->getFriendsChar($pjs[$i]->obj_Id);
                $encode = json_encode($friends);
                if ($friends){
                
                   $aux[$i] = json_decode($encode);
                    
                }
            }
            //Respuesta
            if ($aux) {
                $this->view->response($aux, 200);
             
              
            } else {
                $this->view->response("No se encontro nada", 404);
            }

        } else {
            $this->view->response("No se encontro nada", 404);
        }
    }
    public function getTokenClient()
    {
        if ($this->tokenSV()) {
            $this->view->response($this->token, 200);
           
        } else {
            $this->view->response("Acceso invalido", 404);
        }
    }
    public function pruebaApiToken($params){
        $tokenCliente = $params[':TOKEN'];
        if ($this->tokenSV()) {
            $tokenizacion = $this->validateToken($this->token);
            echo $tokenizacion;
            die;
            $this->view->response($tokenCliente, 200);

           
        } else {
            $this->view->response("Acceso invalido", 404);
        }
    }
    private function validateToken($token)
    {
        try {
            echo "sadsadsa";
            die;
            $key = "l2aklas";
            return JWT::decode($token, $key, 'HS256');
        } catch (Exception $e) {
            return false;
        }
    }
}
