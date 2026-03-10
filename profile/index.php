<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">
        <div class="content">
            <h1>Your profile</h1>

            <article>

                <form action="./" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            <?php include "../Fileupload/pictures.php"?>
            <h3>Sort Adds By:</h3>
            <form>
                <h4>Salary</h4>
                Max: <br><input type="number" name="max-salary"><br>
                Min: <br><input type="number" name="min-salary">
                <h4>Likes</h4>
                <input type="radio" id="likes" name="by-likes" value="likes">
                <label for="likes">Sort By Likes!</label>
                <br><input type="radio" id="no-likes" name="by-likes" value="Don't Sort By Likes!">
                <label for="no-likes">Don't Sort By Likes!</label>
                <br><br><input type="submit" value="Apply!"><br>
            </form>
            <?php include "../Chat/chat.php"?>

            </article>
        </div>
</body>

</html>