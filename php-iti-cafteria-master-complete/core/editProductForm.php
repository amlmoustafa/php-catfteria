<?php
require './Database.php'; 
$db = new Database();


// get the q parameter from URL
$q = $_REQUEST["productId"];

  
$row = $db->select("products","*","id = {$q}");

echo $row['result'] === true ?  "{$row["resultset"]["name"]}**{$row["resultset"]["price"]}**{$row["resultset"]["image"]}**{$row["resultset"]["availability"]}**{$row["resultset"]["id"]}" : "Null" ;

?>