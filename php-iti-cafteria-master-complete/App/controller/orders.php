<?php

session_start();
require '../model/Order.php'; 
$model = new Order();
$result=$model->getAdminorders();

// var_dump ($result);
?>
<?php include('../../views/adminOrders.php') ?>