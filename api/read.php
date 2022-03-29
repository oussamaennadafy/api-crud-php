<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 
 include_once '../config/database.php';
 include_once '../models/users.php';

 $database = new Database();

 $db = $database->getConnection();

 $items = new User($db);

 $records = $items->getusers();

 $itemCount = $records->num_rows;
 
 echo json_encode($itemCount);
 if($itemCount > 0){
  $userArr = array();
  $userArr["body"] = array();
  $userArr["itemCount"] = $itemCount;
 while ($row = $records->fetch_assoc())
 {
  array_push($userArr["body"], $row);
 }
 echo json_encode($userArr);
 }
 else{
  http_response_code(404);
  echo json_encode(
  array("message" => "No record found.")
 );
 }
?>