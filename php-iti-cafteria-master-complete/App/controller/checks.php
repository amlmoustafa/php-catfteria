<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require '../model/Order.php';

$order = new Order();
//$orders = $order->orderChecks();

$checks = $order->orderChecks(3,$_REQUEST["startDate"], $_REQUEST["endDate"]);
$users = $order->getUsers();
// $orders = $order->getOrders($_REQUEST["startDate"], $_REQUEST["endDate"]);
// var_dump($checks);
$counter = 0;
function setEnv($id,$name){
    $_ENV['id'] = $id;
    $_ENV['name'] = $name;
}

?>
<?php include('../../views/adminChecks.php') ?>
