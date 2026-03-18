<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">
        <div class="content">
            <h1>Welcome to your profile, <?php print($_SESSION['username'])?></h1>
            <h3>userid: <?= $_SESSION['userid']?></h3>
            <a href="./edit_account.php"> Edit profile</a>
            <a href="./edit_password.php">Change Password</a>
            <a href="./remove_account.php"> Remove Account</a>

            <article>

                <form action="./" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            <?php include "../Fileupload/pictures.php"?>
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

           <div id="comments">
                <h2>Comments</h2>
                <?php// include "../Chat/view_comments.php"?>
            </div>
        </div>
</body>

</html>