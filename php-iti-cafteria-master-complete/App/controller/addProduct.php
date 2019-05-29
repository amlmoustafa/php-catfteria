<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require '../model/product.php'; 

$p = new Product();
$target_dir = "/var/www/php-iti-cafteria-master-complete/assets/images/";
$target_dir = $_SERVER['DOCUMENT_ROOT'];
if(isset($_FILES["productImage"])){
$target_file = $target_dir . basename($_FILES["productImage"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
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
if ($_FILES["productImage"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

$inputs = array();
if(count($_POST) > 0)
{
  if (!empty($_POST["productName"])) {
      $name= trim($_POST['productName']);
      $inputs['name'] = $_POST['productName'];
      $inputs['availability'] = 1;
      
  }
  if (!empty($_POST["productPrice"])) {
    $price= trim($_POST['productPrice']);
    $inputs['price'] = $price;
  }
  if (!empty($_POST["productCategory"])) {
    $cat= trim($_POST['productCategory']);
    $inputs['category_id'] = $cat;
  }
  if (!empty($_FILES["productImage"])) {
    $img= trim($_FILES["productImage"]["name"]);
    $inputs['image'] = "../../assets/images/".$img;
  }
  if ($uploadOk == 1){
    $result =$p->db->insert("products",$inputs);
    if($result['number_of_rows'])
    {
        header('Location: allProducts.php');
    }
  }
  
}
?>

<?php include('../../views/adminAddProduct.php') ?>
