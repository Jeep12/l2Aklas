<?php
require_once("app/model/user.model.php");
require_once("helpers/users.helpers.php");

class AccountController
{

  protected $token;
  public function __construct()
  {

    $this->modelUser = new UserModel();
    $this->userHelper = new UserHelper();
  }



  public function login()
  {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $nick = $_POST['username'];
      $password = $_POST['password'];
      $user = $this->modelUser->getAccount($nick);
      $passwordBase = base64_encode(pack('H*', sha1($password)));

      if ($user && $user->password == $passwordBase) {
        $this->userHelper->login($user);
        header("Location:" . BASE_URL);
      } else {
        header("Location:" . BASE_URL . "showlogin?error=true");
      }
    } else {
      header("Location:" . BASE_URL);
    }
  }

  public function logout()
  {

    $this->userHelper->logout();
    header("Location:" . BASE_URL);
  }

  public function register()
  {
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6LehXMAgAAAAAEITAl7dW0Is_ZFpt-aAz8njvUH6";
    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
    $atributos = json_decode($respuesta, TRUE);
    if ($atributos['success']) {



      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm = $_POST['confirm'];
      $account =  $_POST['account'];

      $encryptedPassword = base64_encode(pack('H*', sha1($password)));
      $encryptedConfirm = base64_encode(pack('H*', sha1($confirm)));


      $existe = $this->modelUser->getAccount($account);
      if ($existe) {
        header("Location:" . BASE_URL . "showregister?error=e2");
      } else {
        if ($encryptedPassword == $encryptedConfirm) {
          $this->modelUser->addAccount($account, $encryptedPassword, $email);

          header("Location:" . BASE_URL);
        } else {
          header("Location:" . BASE_URL . "showregister?error=e3");
        }
      }
    } else {
      header("Location:" . BASE_URL . "showregister?error=e1");
    }

   


  }
  public function changePwd (){
     
      if (
        !empty($_POST['ancientPassword'])  &&
        !empty($_POST['newPassword']) && 
        !empty($_POST['confirmNewPassword']) && 
        !empty($_SESSION['USERNAME'])) {

          $nick = $_SESSION['USERNAME'];
          $user = $this->modelUser->getAccount($nick);
          
          $antiguaContraseña = $_POST['ancientPassword'];
          $nuevaContraseña = $_POST['newPassword'];
          $confirmacion = $_POST['confirmNewPassword'];

          $encAntiguaContraseña = base64_encode(pack('H*', sha1($antiguaContraseña)));
          $encNuevaContraseña = base64_encode(pack('H*', sha1($nuevaContraseña)));
          $encConfirmacion = base64_encode(pack('H*', sha1($confirmacion)));

          if ($user->password == $encAntiguaContraseña && $encNuevaContraseña == $encConfirmacion && $encNuevaContraseña != $user->password){
  
            $this->modelUser->changePwd($user->login,$encConfirmacion);
            $this->logout();
            header("Location:" . BASE_URL);
    

       
          }else {
            header("Location:" . BASE_URL . "myprofile");
          }
      }else {
        header("Location:" . BASE_URL . "myprofile");
      }
  }
  
}
