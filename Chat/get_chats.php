<?php

include "../phpvault/Methods.php";

$user = $_SESSION['userid'];


$sql = "SELECT chats.id AS chat_id, users.username
        FROM chats
        JOIN chat_users cu1 ON chats.id = cu1.chat_id
        JOIN chat_users cu2 ON chats.id = cu2.chat_id
        JOIN users ON cu2.user_id = users.id
        WHERE cu1.user = ? AND cu2.user != ?";
$stmt = $conn-prepare($sql);
$stmt -> execute([$user, $user]);

$rows = $stmt ->fetchALL();

while ( $row = $rows->fetch_assoc()){
    print("<div onclick='openChat({$row['chat_id']})'>
            Chat with <b>{$row['username']}</b>
          </div>");
}

?>