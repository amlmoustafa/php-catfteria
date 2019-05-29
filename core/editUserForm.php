<?php
require './Database.php'; 
$db = new Database();


// get the q parameter from URL
$q = $_REQUEST["userId"];

  
$row = $db->select("users","*","id = '$q';");
//var_dump($row['resultset'][0]['id']);
echo $row['result'] === true ?  "{$row["resultset"][0]["name"]}**{$row["resultset"][0]["room_id"]}**{$row["resultset"][0]["ext"]}**{$row["resultset"][0]["id"]}" : "Null" ;

?>