<?php

$usr = $_POST['rights-username'];
$sql = "SELECT COUNT(*) AS total FROM profiles WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usr]);
$total = $stmt->fetchColumn();

if ($total == 1) {
    $sql = "UPDATE profiles SET role = 0 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usr]);
    print("$usr was successfully given admin rights!");
} else {
    print("There is no such user!");
}
