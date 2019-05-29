<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require '../model/User.php'; 

$p = new User();
$users = $p->db->select("users");



$inputs = array();
if(count($_POST) > 0)
{
 // var_dump($_POST);
  if (!empty($_POST["nameEditInput"])) {
      $name= trim($_POST['nameEditInput']);
      $inputs['name'] = $name;      
  }
  if (!empty($_POST["roomEditInput"])) {
    $room= trim($_POST['roomEditInput']);
    $inputs['room_id'] = $room;
  }
  if (!empty($_POST["extEditInput"])) {
    $ext= trim($_POST['extEditInput']);
    $inputs['ext'] = $ext;
  }
    var_dump($_POST['userId']);
    $p->db->update("users",$inputs,"id={$_POST["userId"]}");
    //header('Location: '.$_SERVER['PHP_SELF']);
    
}

if(count($_GET) > 0)
{
  if (!empty($_GET["userIdDel"])) {
    $p->db->delete("users","id={$_GET["userIdDel"]}");
    header('Location: '.$_SERVER['PHP_SELF']);
  }
    
}

?>

<?php require('../../views/adminAllUsers.php') ?>

