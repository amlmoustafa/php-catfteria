<?php
session_start();
if (!isset($_SESSION['aid'])) {
    header('Location: login.php');
    // for security 
    exit();
}

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
   // var_dump($inputs);
    var_dump($_POST['userId']);
    $uid=$_POST['userId'];
    $p->db->update("users",$inputs,"id='$uid';");
    header('Location: '.$_SERVER['PHP_SELF']);
    
}

if(count($_GET) > 0)
{
  if (!empty($_GET["userIdDel"])) {
   $delUser= $p->db->delete("users","id={$_GET["userIdDel"]}");
     var_dump($delUser['result']);
   if($delUser['result']==fasle){
       var_dump($delUser['result']);
       echo "cannot delete this user"; 
   }
    header('Location: '.$_SERVER['PHP_SELF']);
  }
    
}

?>

<?php require('../../views/adminAllUsers.php') ?>


