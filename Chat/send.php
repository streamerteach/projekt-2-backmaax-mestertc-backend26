<?php

include "../phpvault/Methods.php";


$chat_id = $_POST['chat_id'];
$user_id = $_SESSION['userid'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (chat_id, user_id, message) VALUES (?, ?, ?)";
$stmt = $conn -> prepare($sql);
$stmt -> execute([$chat_id, $user_id, $message]);
?>