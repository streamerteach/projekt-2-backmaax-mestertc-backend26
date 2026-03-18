<?php

include "../phpvault/Methods.php";


$chat_id= $_GET['chat_id'];
$user = $_SESSION['userid'];

$sql = "SELECT messages.*, profiles.username 
        FROM messages 
        JOIN profiles ON messages.user_id = profiles.id
        WHERE chat_id = ?
        ORDER BY messages.id ASC";

$stmt = $conn ->prepare($sql);
$stmt -> execute([$chat_id]);

while ($row = $stmt->fetch()) {

    $isMe = ($row['user_id'] == $current_user);
    $class = $isMe ? "message-me" : "message-other";

    echo "<div class='$class'>
            <b>" . htmlspecialchars($row['username']) . ":</b>
            " . htmlspecialchars($row['message']) . "
          </div>";
}
?>