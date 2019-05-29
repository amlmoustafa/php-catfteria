<?php
require './Database.php'; 
$db = new Database();


// get the q parameter from URL
$q = $_REQUEST["cat"];


$inputs['name'] = "$q";
  
$result = $db->insert("categories",$inputs);
$id = $db->select("categories","*",null,"id DESC",1);

echo $result['result'] === true ?  $id["resultset"]["id"]."-".$id["resultset"]["name"]: "Null" ;

?>