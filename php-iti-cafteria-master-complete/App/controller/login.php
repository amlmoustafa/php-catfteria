<?php

session_start();
require_once '../model/User.php';
$nameErr = $emailErr = $passwordErr = $cpasswordErr = $roomNoErr = $extErr = $pictureErr = "";
$userModel = new User();
$userVar = array();
$error = 0;

if (isset($_POST['submit'])) {
    //  var_dump($_POST);
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        $nameErr = "email is required";
        $error++;
        $_SESSION['nameErr'] = $nameErr;
        $_SESSION['err'] ="";
    } elseif (!isset($_POST["password"]) || empty($_POST["password"])) {
        $passErr = "password is required";
        $_SESSION['passErr'] = $passErr;
        $_SESSION['err'] ="";
    } else {
        $_SESSION['passErr'] = "";
        $_SESSION['nameErr'] = "";
        $result = $userModel->login($_POST["email"],$_POST["password"]);
        if ($result == null) {
            $_SESSION['err'] = "you don't have the acess to login";
        }else
        {
            $_SESSION['err'] ="";
        }
    }

//    if (isset($_POST["password"]) && empty($_POST["password"])) {
//        $passErr = "password is required";
//        $_SESSION['passErr'] = $passErr;
//        $error++;
//    } else {
//        $userVar['password'] = $_POST["password"];
//        $_SESSION['passErr'] = "";
//    }
} else if (isset($_POST['forget'])) {
    header("Location: ./forgetPassword.php");
    $_SESSION['err'] ="";
}

include ("../../views/components/loginForm.php");
