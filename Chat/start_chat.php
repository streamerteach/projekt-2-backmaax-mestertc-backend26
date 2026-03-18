<?php

include "../phpvault/Methods.php";
$user = $_SESSION['userid'];
$user2 = $_POST['user2'];

$sql = "SELECT c.id
        FROM chats c
        JOIN chat_users cu1 ON c.id = cu1.chat_id
        JOIN chat_users cu2 ON c.id = cu2.chat_id
        WHERE (cu1.user_id = ? AND cu2.user_id = ?)
        OR(cu1.user_id = ? AND cu2.user_id = ?)
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute([$user, $user2, $user2, $user]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo $row['id'];
    exit;
}

$sql = "INSERT INTO chats () VALUE ()";
$stmt = $conn -> prepare($sql);
$stmt ->execute();
$chat_id = $conn->lastInsertId();

$sql = "INSERT INTO chat_users ( chat_id, user_id) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt -> execute([$chat_id, $user]);
$stmt -> execute([$chat_id, $user2]);

echo $chat_id;
?>