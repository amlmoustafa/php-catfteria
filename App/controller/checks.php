<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);

require '../model/Order.php';
if (!isset($_SESSION['aid'])) {
    header('Location: login.php');
    // for security 
    exit();
}


$order = new Order();


// $orders = $order->orderChecks();
// if(isset($_REQUEST["startDate"]) && $_REQUEST["endDate"]){
//     $checks = $order->myOrderChecks($_REQUEST["startDate"], $_REQUEST["endDate"]);
// } else{
//     $_REQUEST["startDate"] = $_REQUEST["endDate"] = null;
//     $checks = $order->myOrderChecks($_REQUEST["startDate"], $_REQUEST["endDate"]);
// }
$users = $order->getUsers();
$user_orders = array();
foreach ($users["resultset"] as $user)
{
    $user_orders[$user['id']]= $user;
    // if(isset($user['id']["resultset"]['sum']))
    // {
    // $user_orders['sum'] = $order->getTotal($user['id'])["resultset"]['sum'];
    // }else
    // {
    //      $user_orders['sum'] = 0;
    // }
    $checks[$user['id']]= $order->getUserOrders($user['id'])["resultset"];
} 
// $orders = $order->getOrders($_REQUEST["startDate"], $_REQUEST["endDate"]);
$counter = 0;
function setEnv($id,$name){
    $_ENV['id'] = $id;
    $_ENV['name'] = $name;
}

?>
<?php include('../../views/adminChecks.php') ?>
