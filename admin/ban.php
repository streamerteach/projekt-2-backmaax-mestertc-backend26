<?php

$usr = $_POST['ban-username'];
$sql = "SELECT COUNT(*) AS total FROM profiles WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usr]);
$total = $stmt->fetchColumn();

if ($total == 1) {
    $sql = "UPDATE profiles SET role = 2 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usr]);
    print("$usr was successfully banned!");
} else {
    print("There is no such user!");
}
