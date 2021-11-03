<?php
include_once "controller/basecontroller.php";

class Logincontroller extends Basecontroller
{
  public function __construct()
  {
    if (isset($_GET['action'])) {
      $action = $_GET['action'];
    } else {
      $action = "login";
    }
    if ($action == "login") {
      Logincontroller::login();
    }
    if ($action == "logout") {
      Logincontroller::logout();
    }
  }
  public static function logout()
  {
    if (isset($_SESSION['email'])) {
      unset($_SESSION['email']);
    }
    if (isset($_SESSION['password'])) {
      unset($_SESSION['password']);
    }
    if (isset($_COOKIE['email'])) {
      setcookie('email', '', time() - 3600, '/');
    }
    if (isset($_COOKIE['password'])) {
      setcookie('password', '', time() - 3600, '/');
    }
    require_once('view/login.php');
  }
  public static function login()
  {
    $user = new user();
    if (isset($_SESSION['email']) || isset($_COOKIE['email'])) {
      header("Location: index.php?controller=note");      
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
      $result = $user->login($_POST);
      if ($result) {
        $_SESSION['email'] = $result['email'];
        $_SESSION['password'] = $result['password'];
        $remember = ((isset($_POST['remember']) != 0) ? 1 : "");
        if ($remember == 1) {
          setcookie('email', $result['email'], time() + 3600 * 24 * 30, '/');
          setcookie('password', $result['password'], time() + 3600 * 24 * 30, '/');
        }
        header("Location: index.php?controller=note");
      } else {
        $alert = "<span class='error'>SAI EMAIL HOẶC MẬT KHẨU</span>";
        require_once('view/login.php');
      }
    }
    require_once('view/login.php');
  }
}
