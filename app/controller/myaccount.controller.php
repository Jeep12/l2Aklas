<?php
require_once("app/model/user.model.php");
require_once("helpers/users.helpers.php");
require_once("vendor/autoload.php");
use Firebase\JWT\JWT;
class AccountController
{

    public function __construct()
    {
        $this->modelUser = new UserModel();
        $this->userHelper = new UserHelper();
    }
    
    protected  function validarToken($token){
        try {

        //  $key = Services::getScretKey();
        }catch(Exception $e){

        }
        
    }
    static public function jwt ($id,$email){
     $time = time();
     $token = array(
      "iat"=>$time,
      "exp"=>$time + (60),
      "data"=>[
        "account"=>$id,
        "email"=>$email
      ]);

     return $token;
    }
    public function login()
    {

     
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $nick = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->modelUser->getAccount($nick);
            $passwordBase = base64_encode(pack('H*', sha1($password)));

            if ($user && $user->password == $passwordBase) {

              $token =  $this->jwt($user->login,$user->email);
              $jwt = JWT::encode( $token,"lskadl20lsdsñzñ204odk390akx",'HS256');
              $this->modelUser->updateJWT($jwt,$token['exp'],$token['data']['account']);
              $arr = explode('.', $jwt);
         
                $this->userHelper->login($user);
                header("Location:" . BASE_URL);
              }else {
                header("Location:" . BASE_URL . "showlogin?error=true");
            }
            }else {
                header("Location:" . BASE_URL );
            }
        }

        public function logout(){
            
        $this->userHelper->logout();
        header("Location:" . BASE_URL);

       }

       public function register(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretkey = "6LehXMAgAAAAAEITAl7dW0Is_ZFpt-aAz8njvUH6";
        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
         $atributos = json_decode($respuesta,TRUE);
         if ($atributos['success']){
 


                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm = $_POST['confirm'];
                $account =  $_POST['account'];

                $encryptedPassword = base64_encode(pack('H*', sha1($password)));
                $encryptedConfirm = base64_encode(pack('H*', sha1($confirm)));

               
                $existe = $this->modelUser->getAccount($account);
                if ($existe){
                  header("Location:" . BASE_URL . "showregister?error=e2" );

                }else {
                    if ($encryptedPassword == $encryptedConfirm){
                      $this->modelUser->addAccount($account,$encryptedPassword,$email);
                
                      header("Location:" . BASE_URL );
                    }else {
                      header("Location:" . BASE_URL . "showregister?error=e3" );
                    }
                }
            
     }else {
      header("Location:" . BASE_URL . "showregister?error=e1" );
     }
        
       
        
         
      //  die;
        //Esta encriptacion es la que utiliza el cliente interlude bbdd l2jbc table account
       // $pass = base64_encode(pack('H*', sha1($password)));
        //$user =  $this->modelUser->getAccount($account);
        //print_r( $user);
        //echo "Contraseña de usuario admin: " . $user->password;
        //echo "Contraseña puesta: "  . $pass;
        //if ($user->password == $pass) {
          //  echo "Contraseñas coinciden";
        //}else {
          //  echo "no coinciden";
       // }
       // $this->modelUser->addAccount($account,$pass);
        //header("Location:" . BASE_URL);

    }
}