<?php
$usr = $_SESSION['username'];

$mygender = "SELECT gender FROM profiles WHERE username = $usr";
$mypreference = "SELECT preference FROM profiles WHERE username = $usr";

$baseset = "SELECT * FROM profiles WHERE preference = $mygender AND gender = $mypreference";

?>