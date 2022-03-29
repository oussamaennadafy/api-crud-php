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
$user = new user($db);

if(!empty($_GET['first_name']) && !empty($_GET['last_name']) && !empty($_GET['age']) && !empty($_GET['birth'])) {
 $user->first_name = $_GET['first_name'];
 $user->last_name = $_GET['last_name'];
 $user->age = $_GET['age'];
 $user->birth = $_GET['birth'];
}


if($user->createUser()){
echo 'user created successfully ';
} else{
echo 'user could not be created ';
}
?>