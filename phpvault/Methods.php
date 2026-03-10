<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors','1'); //NOT IN PRODUCTION

session_start();

//Input Sanitations
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;  
}

$servername = "localhost";
$dbname = "backmaax";
$username = "backmaax";
include "../db_pass.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>