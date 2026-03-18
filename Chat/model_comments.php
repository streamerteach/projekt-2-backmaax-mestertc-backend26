<?php

$userid = $_SESSION['userid'];
//Fetch data from DB
//$sql = "SELECT * FROM comments WHERE receiver_id = ?";

$sql = "SELECT sender_id, username, comment, receiver_id FROM profiles INNER JOIN comments ON profiles.id = comments.sender_id WHERE comments.receiver_id = ?";

$stmt = $conn -> prepare($sql);
$stmt -> execute([$userid]);
$row = $stmt -> fetch();



if(!empty($_POST['reply'])){

    
}