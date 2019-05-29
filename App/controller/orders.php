<?php

session_start();
if (!isset($_SESSION['aid'])) {
    header('Location: login.php');
    // for security 
    exit();
}
require '../model/Order.php'; 
$model = new Order();
$result=$model->getAdminorders();

// var_dump ($result);
?>
<?php include('../../views/adminOrders.php') ?>