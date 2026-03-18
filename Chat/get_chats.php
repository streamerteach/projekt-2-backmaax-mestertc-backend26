<?php

include "../phpvault/Methods.php";

$user = $_SESSION['userid'];


$sql = "SELECT chats.id AS chat_id, profiles.username FROM chats 
JOIN chat_users cu1 ON chats.id = cu1.chat_id 
JOIN chat_users cu2 ON chats.id = cu2.chat_id JOIN profiles ON cu2.user_id = profiles.id 
WHERE cu1.user_id = ? AND cu2.user_id != ?";
$stmt = $conn->prepare($sql);
$stmt -> execute([$user, $user]);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    $chatId = (int)$row['chat_id'];
    $username = htmlspecialchars($row['username']);

    echo "<div class='chat-item' onclick='openChat($chatId)'>
            Chat with <b>$username</b>
          </div>";
}

?>