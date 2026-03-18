<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<?php include "../phpvault/visitoradder.php"?>
<?php include "../phpvault/visitoramount.php"?>

<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">
        <div id="admin-box">
            <div class="admin-content">
                <form method="POST">
                    <button type="submit" name="adminButton" value="ban">Ban Users</button>
                </form>
            </div>
            <div class="admin-content">
                <form method="POST">
                    <button type="submit" name="adminButton" value="rights">Grand Admin rights</button>
                </form>
            </div>
        </div>
        
        <?php if (isset($_POST['adminButton']) and $_POST['adminButton'] == "ban") {
            include "banform.php";
        } else if ($_POST['adminbutton'] == "right") {
            include "rightsform.php";
        }?>

        <?php if ()
    </section>
</body>
</html>
