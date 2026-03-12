<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<?php if (isset($_SESSION['username'])) {
    header("Refresh:1; url=../profile/");
}
?>

<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">
        
        <div class="content">
            <h1>Login</h1>

            <article>
               <?php include "view_login.php"?>
                <p>If you don't have an account?<a href="../register/index.php">Register here!</a></p>
            </article>
        </div>
    </section>
</body>
</html>