<?php
$username = 'root';
$dsn = 'mysql:host=localhost; dbname=house_buy';
$password = '';

try{
  $db = new PDO($dsn, $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected to the house_buy database.";
}catch(PDOException $ex) {
  echo "Connection Failed: ".$ex->getMessage();
}
