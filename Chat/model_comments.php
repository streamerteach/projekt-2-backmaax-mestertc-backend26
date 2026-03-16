<?php

$userid = $_SESSION['userid'];
//Fetch data from DB
//$sql = "SELECT * FROM comments WHERE receiver_id = ?";

$sql = "SELECT sender_id, username, comment, receiver_id FROM profiles INNER JOIN comments ON profiles.id = comments.sender_id WHERE comments.receiver_id = ?";

$stmt = $conn -> prepare($sql);
$stmt -> execute([$userid]);
$rows = $stmt -> fetchAll();

if(!empty($_POST['comment'])){
$comment = $_POST['comment'];
$receiver = $_POST['receiver_id'];
$sender = $_SESSION['user_id'];

$sql = "INSERT INTO comments (id,sender_id, receiver_id, comment)
        VALUES (null, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$sender, $receiver, $comment]);
}