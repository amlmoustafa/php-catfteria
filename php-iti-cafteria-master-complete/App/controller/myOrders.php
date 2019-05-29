<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require '../model/Order.php';

$order = new Order();
$orders = $order->getOrders($_REQUEST["startDate"], $_REQUEST["endDate"]);
$total = 0;
// function setInterval($f, $milliseconds)
// {
//     $seconds=(int)$milliseconds/1000;
//     while(true)
//     {
//         $f();
//         sleep($seconds);
//     }
// }
?>
<?php include('../../views/myOrders.php'); ?>

