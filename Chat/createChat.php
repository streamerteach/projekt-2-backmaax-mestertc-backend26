<?php

include "../phpvault/Methods.php";

$user = $_SESSION['userid'];
$user2 = $_POST['user2'];   // temp until we have a working add card


$sql = "INSERT INTO chats () VALUES()";
$stmt = $conn-> prepare($sql);
$stmt -> execute();

$chat_id = $conn -> insert_id;


$sql= "INSERT INTO chat_users (chat_id, user_id) VALUES (?, ?)";
$stmt = $conn -> prepare($sql);
$stmt-> execute([$chat_id, $user]);

$$sql= "INSERT INTO chat_users (chat_id, user_id) VALUES (?, ?)";
$stmt = $conn -> prepare($sql);
$stmt-> execute([$chat_id, $user2]);

print('chat_id');

?>
