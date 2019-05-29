<?php
session_start();
session_start();
if (!isset($_SESSION['aid'])) {
    header('Location: login.php');
    // for security 
    exit();
}


require '../model/product.php'; 

$p = new Product();
$products = $p->db->select("products");

if(isset($_GET['page']))
{
  $pageno = $_GET['page'];
}
else{
  $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno-1) * $no_of_records_per_page;
$pageNum=ceil(count($products['resultset'])/$no_of_records_per_page);
$pageProducts = array_slice($products['resultset'],$offset,$no_of_records_per_page);

$inputs = array();
if(count($_POST) > 0)
{
  if (!empty($_POST["nameEditInput"])) {
      $name= trim($_POST['nameEditInput']);
      $inputs['name'] = $name;      
  }
  if (!empty($_POST["priceEditInput"])) {
    $price= trim($_POST['priceEditInput']);
    $inputs['price'] = $price;
  }
  if (!empty($_POST["avaEditInput"])) {
      if($_POST["avaEditInput"] == "0" )
      {
        $inputs['availability'] = 0;
      }
      else{
        $inputs['availability'] = intval($_POST["avaEditInput"]);
      }
    
  }
//  var_dump($_POST['productId']);
    $p->db->update("products",$inputs,"id={$_POST["productId"]}");
    header('Location: '.$_SERVER['PHP_SELF']);
    
}

if(count($_GET) > 0)
{
  if (!empty($_GET["productIdDel"])) {
      $delID = $_GET["productIdDel"];
    $finalResult = $p->db->delete("products","id={$delID}".";");
    if($finalResult['result'] == false)
    {
         echo "<div class='alert alert-danger mt-3'> Item isn't deleted </div>";
    }
        

    header('Location: '.$_SERVER['PHP_SELF']);
  }
    
}

?>

<?php require('../../views/adminAllProducts.php') ?>

