<header>
    <div id="logo">Pink Dates</div>
    <nav>
        <ul>
            <a href="../home/"><li>Home</li></a>
            <?php
                if(!empty($_SESSION['username'])) {
                    print('<a href="../profile/"><li>Profile</li></a>');
                    print('<a href="../logout/logout.php"><li>Log Out</li></a>');
                } else {
                    print('<a href="../login/"><li>Login</li></a>');
                }
            ?>
            
        </ul>
    </nav>
</header>