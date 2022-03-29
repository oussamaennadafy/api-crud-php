<?php

class User{
 
// db connection
private $db;
// Table
private $db_table = "users";
// Columns
public $id;
public $first_name;
public $last_name;
public $age;
public $birth;
public $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getusers(){
$sqlQuery = "SELECT id, first_name, last_name, age, birth FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createUser(){
// sanitize
$this->first_name=htmlspecialchars(strip_tags($this->first_name));
$this->last_name=htmlspecialchars(strip_tags($this->last_name));
$this->age=htmlspecialchars(strip_tags($this->age));
$this->birth=htmlspecialchars(strip_tags($this->birth));

if(!empty($this->first_name) && !empty($this->last_name) && !empty($this->age) && !empty($this->birth)){

 $sqlQuery = "INSERT INTO
 ". $this->db_table ." SET first_name = '".$this->first_name."',
 last_name = '".$this->last_name."',
 age = '".$this->age."',birth = '".$this->birth."'";

 $this->db->query($sqlQuery);
} else {
 echo'please entre first name, last name, age and birth';
}


if($this->db->affected_rows > 0){
return true;
}
return false;
}

// read One
public function getSingleUser(){

$sqlQuery = "SELECT id, first_name, last_name, age, birth FROM
". $this->db_table ." WHERE id = ".$this->id;

$record = $this->db->query($sqlQuery);

$dataRow=$record->fetch_assoc();

if($this->db->affected_rows > 0){
 $this->first_name = $dataRow['first_name'];
 $this->last_name = $dataRow['last_name'];
 $this->age = $dataRow['age'];
 $this->birth = $dataRow['birth'];
 }
}

// UPDATE
public function updateUser(){

$this->first_name=htmlspecialchars(strip_tags($this->first_name));
$this->last_name=htmlspecialchars(strip_tags($this->last_name));
$this->age=htmlspecialchars(strip_tags($this->age));
$this->birth=htmlspecialchars(strip_tags($this->birth));
$this->id=htmlspecialchars(strip_tags($this->id));


 $sqlQuery = "UPDATE ". $this->db_table ." SET first_name = '".$this->first_name."',
 last_name = '".$this->last_name."',
 age = '".$this->age."',birth = '".$this->birth."'
 WHERE id = ".$this->id;
 
 $this->db->query($sqlQuery);


if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteUser(){

 $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
 $this->db->query($sqlQuery);

 if($this->db->affected_rows > 0){
 return true;
 }
 return false;
 }
}
?>