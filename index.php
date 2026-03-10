<?php
//Error reporting
error_reporting(E_ALL);
ini_set('display_errors','1'); //NOT IN PRODUCTION

session_start();

//Input Sanitations
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;  
}

$servername = "localhost";
$dbname = "backmaax";
$username = "backmaax";
include "./db_pass.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<?php include "./phpvault/consensualcookie.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Dating</title>
</head>
<body>
    <header>
        <div id="logo">Dating</div>
        <nav>
            <ul>
                <a href="./home/"><li>Home</li></a>
                <a href="./login/"><li>Login</li></a>
            </ul>
        </nav>
    </header>
    <section id="main-container">
        <div class="content">
            <div id="greeting" class="item">
                <h3><?php include "./phpvault/landingpage.php"?></h3>
                <p><?php include "./phpvault/functionalcookie.php"?></p>
                <a href="./rapport/rapport.php">Projektrapport</a>
            </div>

            <div id="cookie-choice" class="item">
                <?php 
                if (!isset($_COOKIE['consent-cookie'])) {
                    include "./phpvault/cookiehtml.php";
                }
                ?>
            </div>
        </div>
    <section>
</body>
</html>