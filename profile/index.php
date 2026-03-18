<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">
        <div class="content">
            <h1>Welcome to your profile, <?php print($_SESSION['username'])?></h1>
            <h3>userid: <?= $_SESSION['userid']?></h3>
            <div class="profile-container">

    <!-- Current Profile Picture -->
    <div class="current-pfp">
    <h3>Current Profilepicture</h3>
        <?php
        $dir = $_SESSION['path'] . "/current/";
        $files = array_diff(scandir($dir), ['.', '..']);

        if (empty($files)) {
            echo '<img src="../Fileupload/default.jpeg">';
        } else {
            $file = array_values($files)[0];
            echo '<img src="' . $dir . $file . '">';
        }
        ?>
    </div>

    <!-- Old Profile Pictures Grid -->
    <div class="old-pfp-grid">
        <?php
        $oldDir = $_SESSION['path'] . "/old/";
        $oldFiles = array_diff(scandir($oldDir), ['.', '..']);
        $oldFiles = array_slice($oldFiles, -9);

        foreach ($oldFiles as $file) {
            echo '<a href="?restore=' . urlencode($file) . '">';
            echo '<img src="' . $oldDir . $file . '">';
            echo '</a>';
        }
        ?>
    </div>

            <article>
                <?php include "../Fileupload/pictures.php"?>
                <form action="./" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
        <ul>
            <a class="editButton"href="./edit_account.php"> <li>Edit profile</li></a>
            <a class="editButton"href="./edit_password.php"><li>Change Password</li></a>
            <a class="editButton"href="./remove_account.php"><li> Remove Account</li></a>
        </ul>   
            <h3>Sort Adds By:</h3>
            <form method="POST">
                <h4>Salary</h4>
                Max: <br><input type="number" name="max-salary"><br>
                Min: <br><input type="number" name="min-salary">
                <h4>Likes</h4>
                <input type="radio" id="likes" name="by-likes" value="likes">
                <label for="likes">Sort By Likes!</label>
                <br><input type="radio" id="no-likes" name="by-likes" value="Don't Sort By Likes!">
                <label for="no-likes">Don't Sort By Likes!</label>
                <br><br><input type="submit" name="sorting" value="Apply!"><br>
            </form>

            </article>

        </div>
</body>

</html>