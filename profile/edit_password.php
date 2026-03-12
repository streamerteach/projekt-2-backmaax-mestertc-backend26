<?php 
include "../phpvault/Methods.php";
include "../phpvault/header.php";
include "../phpvault/consensualcookie.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!empty($_POST['pwdOld']) && !empty($_POST['pwdNew']) && !empty($_POST['pwdRE'])){

        $userid = $_SESSION['userid'];

        $sql = "SELECT passhash FROM profiles WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userid]);
        $hash = $stmt->fetchColumn();

        if(password_verify($_POST['pwdOld'], $hash) && $_POST['pwdNew'] == $_POST['pwdRE']){

            $newPwdHash = password_hash($_POST['pwdNew'], PASSWORD_DEFAULT);

            $sql = "UPDATE profiles SET passhash = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$newPwdHash, $userid]);

            print( "<p>Your password has been changed</p>");
            header("Refresh:3; url=./index.php");
            exit;
        }
        else{
            print( "<p>Please verify your passwords</p>");
        }
    }
    else{
        print( "<p>Please fill all fields</p>");
    }
}
?>

<body>

<?php include "../phpvault/menu.php" ?>

<section id="main-container">

<div id="pwdChange">
<form action="" method="POST">
Old password:<br>
<input type="password" name="pwdOld"><br>

New password:<br>
<input type="password" name="pwdNew"><br>

Re-enter new password:<br>
<input type="password" name="pwdRE"><br><br>

<input type="submit" value="Change password">
</form>

</div>

</section>

</body>