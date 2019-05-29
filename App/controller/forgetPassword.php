<?php
session_start();
require_once '../model/User.php';
$userModel = new User();
$userVar=array();
function randomPassword() {
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); //remember to declare $pass as an array
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
  }
  return implode($pass); //turn the array into a string
}
if(isset($_POST['submit']))
{
    //var_dump($_POST);
    $inputs=array();
    $useremail = $_POST['email'];
    $user= $userModel->db->select("users" ,"*","email='$useremail';");
    $result = $user['resultset'];
  //  var_dump($user);
    //var_dump($result);
  $email_id=$result[0]['email'];
  
    //var_dump($email_id);
  $password=randomPassword();
  $inputs['password']=$password;
	if($useremail==$email_id) {
               $userModel->db->update("users" ,$inputs,"email='$useremail';");
				$to = $email_id;
                $subject = "Password";
                $txt = "Your new password is : $password.";
                $headers = "From: cafteria.iti@gmail.com" . "\r\n" .
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