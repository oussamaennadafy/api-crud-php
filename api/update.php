<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/users.php';

$database = new Database();
$db = $database->getConnection();
$item = new User($db);




$item->id = isset($_GET['id']) ? $_GET['id'] : die('please entre the id');


 $item->first_name = $_GET['first_name'];
 $item->last_name = $_GET['last_name'];
 $item->age = $_GET['age'];
 $item->birth = $_GET['birth'];



if($item->updateuser()){
echo json_encode("user data updated.");
} else{
echo json_encode("Data could not be updated");
}
?>