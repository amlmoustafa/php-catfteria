<?php
session_start();
require_once '../model/Order.php';
if (isset($_GET['selectValue'])) {
    $model = new Order();
    $userDetails =$model->getUserRoom($_GET['selectValue']);
//    var_dump($userDetails);
//    echo $userDetails['room_id'];
}
?>
<?php if (isset($userDetails)): ?>
<?php echo $userDetails['room_id'] ?>
<?php endif ;?>