<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">


    <div id="Account">
    <h2>You are about to DELETE your account</h>
        <h3>Please provide your password to proceed</3>
        <form method="post">
            Password: <input type="password" name="pwd">
            <input type="submit" value="Confirm">
        </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (! empty($_POST['pwd'])) {

                $userid = $_SESSION['userid'];

                $sql  = "SELECT passhash FROM profiles WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$userid]);
                $hash = $stmt->fetchColumn();

                if (password_verify($_POST['pwd'], $hash)) {

                    $sql  = "DELETE FROM profiles WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    
                    if ($stmt->execute([$userid])) {
                        print('your account has been deleted');
                        session_destroy();
                        header("Refresh:5; url=../login/");
                        exit;
                    }
                }
                else{
                    print('Incorrect password');
                }
            }
            else{
                Print('Please provide your password');
            }
        
        }
    ?>
    
</section>
</body>