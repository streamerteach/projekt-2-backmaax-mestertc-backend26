<?php

include "../phpvault/Methods.php";
$user = $_SESSION['userid'];
$user2 = $_POST['user2'];

$sql = "SELECT chats.id
        FROM chats 
        JOIN chat_users on chats.id = chat_users.chat_id
        JOIN chat_users on chats.id = chat_users.chat_id
        WHERE chat_users.user_id = ? AND chat_users.user_id = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt-> execute([$user, $user]);
$rows = $stmt -> fetchALL();

if($row = $rows->fetch_assoc()){
    echo $row['id'];
    exit;
}

$sql = "INSERT INTO chats () VALUE ()";
$stmt = $conn -> prepare($sql);
$stmt ->execute();
$chat_id = $conn->insert_id;

$sql = "INSERT INTO chat_users ( chat_id, user_id) VALUES (?,?)";
$stmt = $conn-prepare($sql);
$stmt -> execute([$chat_id, $user]);

$sql = "INSERT INTO chat_users ( chat_id, user_id) VALUES (?,?)";
$stmt = $conn-prepare($sql);
$stmt -> execute([$chat_id, $user2]);

echo $chat_id;
?>