
<?php session_start(); ?>
<?php






error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


require_once '../model/User.php';
$nameErr=$emailErr=$passwordErr=$cpasswordErr=$roomNoErr=$extErr=$pictureErr="";
$user = new User();
$userVar=array();
$error=0;

       if (isset($_POST['submit'])) {
       
       // var_dump(empty($_POST["name"]));
        if (empty($_POST["name"])) {
            
          $nameErr = "Name is required";
        //  var_dump($nameErr);
          $error++;
        } else {
          $userVar['name'] = $_POST["name"];
        }

        if(empty($_POST["email"])){
            $emailErr="email is required";
            $error++;
        }
        else{
            $useremail=$_POST["email"];
             $users= $user->db->select("users" ,"*","email='$useremail';");
             $result = $users['resultset'];
              //  $count_row = count($users);
                var_dump(empty($result[0]['email']));
                if(empty($result[0]['email']) ){
                    $userVar['email']=$useremail;
                }
                else{
                    $emailErr="this is email is used before"; 
                    $error++;
                }
            
        }
        if(empty($_POST["password"])){
            $passwordErr="password is required";
            $error++;
        }
        if(empty($_POST["cpassword"])){
            $cpasswordErr="confirm password is required";
            $error++;
        }
        else{
            if($_POST["password"]==$_POST["cpassword"]){
                
                $userVar['password']=md5($_POST["password"]);
            }
            else{
                $cpasswordErr="please enter the same password";
                $error++;
            }
        }
        if(empty($_POST["roomNo"])){
            $roomNoErr="room number is required";
            $error++;
        }
        else{
            var_dump($_POST['roomNo']);
            //   $num=$_POST['roomNo'];
            // //  $user->db->insert("rooms",$room);
            // //  $roomid=$user->db->select('rooms','id',$where = "number =$num");
            // $room= $user->db->select("rooms" ,"*","number='$num';");
            // $result = $room['resultset'];
            $userVar['room_id']=$_POST['roomNo'];
            
        }
        if(empty($_POST["ext"])){
            $extErr="ext is required";
            $error++;
        }
        else{
            $userVar['ext']=$_POST["ext"];
        }
        if (!empty($_POST["profilePicture"])) {
            $img= $_POST["profilePicture"];
            var_dump($img);
            $userVar['image'] = "../../assets/images/".$img;
           // $userVar['image']=$_POST["profilePicture"];
          }
        
        if($error == 0)
        {   var_dump($error);                                          
            $userVar['role_id']=2;
            $user->db->insert("users",$userVar);
          // $useri=$user->addUser($userVar['name'],$userVar['email'],$userVar['password'],$userVar['room_id'],$userVar['image'],$userVar['ext']);
           // var_dump($userVar);
            
        }
        else{
            var_dump($error);
           // header("Location: ./addUser.php");    
        }


}

        $target_dir = "/var/www/html/php-iti-cafteria/assets/images/";
        if(isset($_FILES["profilePicture"])){
        $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["profilePicture"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }}




    
?>

<?php include('../../views/adminAddUser.php') ?>