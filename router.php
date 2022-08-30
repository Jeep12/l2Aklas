<?php
require_once("app\controller\aklas.controller.php");
require_once("app\controller\myaccount.controller.php");



define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


if (!empty($_GET['action'])) {
   $action = $_GET['action'];
} else {
   $action = 'home';
}
$aklasController = new  AklasController();
$myAccountController = new AccountController();

$params = explode('/', $action);
switch ($params[0]) {
   case 'home':
      $aklasController->showHome();
    break;
   case 'login':
      $myAccountController->login();
   break;
   case 'register':
      $myAccountController->register();
   break;
   case 'logout':
      $myAccountController->logout();
   break;
   case 'showlogin':
      $aklasController->showLogin();
   break;
   case 'showregister':
      $aklasController->showRegister();
   break;
   case 'myprofile':
      $aklasController->showMyProfile();
   break;
   case 'panelAdmin':
      $aklasController->showPanelAdmin();
   break;
     case 'pruebas':
      $aklasController->pruebas();
   break;
   case 'downloads':
      $aklasController->showDownloads();
   break;
   
   
      


  
}
