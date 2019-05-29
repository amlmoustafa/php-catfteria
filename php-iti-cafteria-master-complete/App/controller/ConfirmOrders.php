<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfirmOrders
 *
 * @author lenovo
 */
session_start();
require_once '../model/Order.php';
$model = new Order();
$orderId;
if(isset($_POST) && count($_POST) >0)
{
     if (!isset($_POST["user_id"]) || empty($_POST["user_id"])) {
        $nameErr = "you must choose user";
        $_SESSION['userErr'] = $nameErr;
    } else {
        $orderId =$model->addOrder($_POST);
    }
    
    
}
$result=$model->getAllProducts();
//var_dump($result['users']);
include ("../../views/adminConfirmOrders.php");        
        
?>



