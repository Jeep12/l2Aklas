<?php
require_once("app/model/user.model.php");
require_once("api/view/api-view.php");
class ApiAklasController
{   
    private $User;
    private $view;
    private $data;

    public function __construct()
    {
        $this->User = new UserModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
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
        $sendOk = $this->User->addNoticia($comment->mensaje,$comment->fecha,$comment->autor);

        if ($sendOk) {
            $this->view->response("Se insertó correctamente", 200);
        } else {
            $this->view->response("Hubo un error", 500);
        }
    }
    public function getAllNoticias(){
        $search = $this->User->getAllNoticias();
        
        if ($search) {
            $this->view->response($search, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
       
        }
    }
    public function getBaseClass($params){
        $class = $params[':ID'];
        $response = $this->User->getBaseClass($class);
        if ($response) {
            $this->view->response($response, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
       
        }
        
    }
    public function getClan($params){
        $clan = $params[':ID'];
     
        $response = $this->User->getClan($clan);
      
        if ($response) {
            $this->view->response($response, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
       
        }
    }
    public function getInv($params){
        $char = $params[':ID'];
      
        $armor = $this->User->armor($char);
        $weapon = $this->User->weapon($char);
        $misc = $this->User->misc($char);
        $inventario  = array_merge($armor,$weapon,$misc);
        if ($inventario) {
            $this->view->response($inventario, 200);
        } else {
            $this->view->response("No se encontro nada", 404);
       
        }
    }
    public function practica(){
        $nombre = $_GET['nombre'];
        echo $nombre;
    }
  
  
}
