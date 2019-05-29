<?php
require './Database.php'; 
$db = new Database();


// get the q parameter from URL
$q = $_REQUEST["productId"];

  
$row = $db->select("products","*","id = {$q}");

echo $row['result'] === true ?  "{$row["resultset"][0]["name"]}**{$row["resultset"][0]["price"]}**{$row["resultset"][0]["image"]}**{$row["resultset"][0]["availability"]}**{$row["resultset"][0]["id"]}" : "Null" ;

?>