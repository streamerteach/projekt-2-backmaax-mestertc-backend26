<?php
$usr = $_SESSION['username'];

$sql = "SELECT gender, preference FROM profiles WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usr]);
$data = $stmt->fetch();

$mygender = $data['gender'];
$mypreference = $data['preference'];

if ($mypreference == 3) {
    $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ?";
    $baseset = "SELECT * FROM profiles WHERE preference = ? LIMIT ?, ?";
} else {
    $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? OR preference = ? AND gender = ?";
    $baseset = "SELECT * FROM profiles WHERE preference = ? OR preference = ? AND gender = ? LIMIT ?, ?";
}



