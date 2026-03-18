<?php
$usr = $_SESSION['username'];

$sql = "SELECT gender, preference FROM profiles WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usr]);
$data = $stmt->fetch();

$mygender = $data['gender'];
$mypreference = $data['preference'];

if ($mypreference == 3) {
    if (isset($_POST['sorting'])) {
        $maxSalary = isset($_POST['max-salary']) ? (int)$_POST['max-salary'] : 0;
        $minSalary = isset($_POST['min-salary']) ? (int)$_POST['min-salary'] : 1000000;
        $byLikes   = isset($_POST['by-likes']) ? $_POST['by-likes'] : null;
        
        if (isset($byLikes)) {
            $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? AND role != 2 AND $minSalary < salary < $maxSalary";
            $baseset = "SELECT * FROM profiles WHERE preference = ? AND role != 2 AND $minSalary < salary < $maxSalary LIMIT ?, ? ORDER BY likes DESC";
        } else {
            $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? AND role != 2 AND $minSalary < salary < $maxSalary";
            $baseset = "SELECT * FROM profiles WHERE preference = ? AND role != 2 AND $minSalary < salary < $maxSalary LIMIT ?, ?";
        }
    } else {
        $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? AND role != 2";
        $baseset = "SELECT * FROM profiles WHERE preference = ? AND role != 2 LIMIT ?, ?";
    }
    
} else {

    if (isset($_POST['sorting'])) {
        $maxSalary = isset($_POST['max-salary']) ? (int)$_POST['max-salary'] : 0;
        $minSalary = isset($_POST['min-salary']) ? (int)$_POST['min-salary'] : 1000000;
        $byLikes   = isset($_POST['by-likes']) ? $_POST['by-likes'] : null;
        
        if (isset($byLikes)) {
            $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? AND role != 2 OR preference = ? AND gender = ? AND role != 2 AND $minSalary < salary < $maxSalary";
            $baseset = "SELECT * FROM profiles WHERE preference = ? AND role != 2 OR preference = ? AND gender = ? AND role != 2 AND $minSalary < salary < $maxSalary LIMIT ?, ? ORDER BY likes DESC";
        } else {
            $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? AND role != 2 OR preference = ? AND role != 2 AND gender = ? AND $minSalary < salary < $maxSalary";
            $baseset = "SELECT * FROM profiles WHERE preference = ? AND role != 2 OR preference = ? AND gender = ? AND role != 2 AND $minSalary < salary < $maxSalary LIMIT ?, ?";
        }
    } else {
        $amountcheck = "SELECT COUNT(*) AS total FROM profiles WHERE preference = ? AND role != 2 OR preference = ? AND role != 2 AND gender = ?";
        $baseset = "SELECT * FROM profiles WHERE preference = ? AND role != 2 OR preference = ? AND role != 2 AND gender = ? LIMIT ?, ?";
    }
}



