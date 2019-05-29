<?php









require_once '../model/User.php';
$userModel = new User();
$user=$userModel->logout();
//include ("../../views/components/loginForm.php");