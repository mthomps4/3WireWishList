<?php
include 'credentials.php';

try{
  $db = new PDO("mysql:host=localhost;dbname=$dbname",$dbuser,$dbpw);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Connected to Database';
}catch(Exception $e){
  echo $e->getMessage();
  exit;
}

//If database !exisit
//Create all and populate seed data

//else check table exist keep moving on ...


?>
