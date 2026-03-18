<?php
$usr = $_SESSION['username'];

$sql = "SELECT gender, preference FROM profiles WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usr]);
$data = $stmt->fetch();

$mygender = $data['gender'];
$mypreference = $data['preference'];

$sql = "SELECT * FROM profiles WHERE preference = ? AND gender = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$mygender, $mypreference]);
$baseset = $stmt->fetch();