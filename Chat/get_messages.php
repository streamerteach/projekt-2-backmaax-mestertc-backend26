<?php

include "../phpvault/Methods.php";


$chat_id= $_GET['chat_id'];
$user = $_SESSION['userid'];

$sql = "SELECT messages.*, users.username 
        FROM messages 
        JOIN users ON messages.user_id = profiles.id
        WHERE chat_id = ?
        ORDER BY messages.id ASC";

$stmt = $conn ->prepare($sql);
$stmt -> execute([$chat_id]);

$rows = $stmt -> fetchAll();

while ($row = $rows ->fetch_assoc()){
    print("<p><b>{$row['username']}:</b>". htmlspecialchars($row['message']) . "</p>" )
}
?>