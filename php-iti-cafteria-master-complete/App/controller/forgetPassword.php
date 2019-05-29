<?php
session_start();
require_once '../model/User.php';
$userModel = new User();
$userVar=array();

if(isset($_POST['submit']))
{
    //var_dump($_POST);
    $useremail = $_POST['email'];
    $user= $userModel->db->select("users" ,"*","email='$useremail';");
    $result = $user['resultset'];
  //  var_dump($user);
    //var_dump($result);
    $email_id=$result[0]['email'];
    //var_dump($email_id);
	$password=$result['password'];
	if($useremail==$email_id) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: saratarek224@gmail.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
                echo "send";
			}
				else{
					echo 'invalid userid';
				}
}
?>

<?php include ("../../views/forgetPassword.php"); ?>