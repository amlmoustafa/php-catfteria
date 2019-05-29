<?php
require './Database.php'; 
$db = new Database();


// get the q parameter from URL
$q = $_REQUEST["userId"];

  
$row = $db->select("users","*","id = {$q}");

echo $row['result'] === true ?  "{$row["resultset"]["name"]}**{$row["resultset"]["room_id"]}**{$row["resultset"]["ext"]}**{$row["resultset"]["id"]}" : "Null" ;

?>