<header>
    <div id="logo">Pink Dates</div>
    <nav>
        <ul>
            <a href="../home/"><li>Home</li></a>
            <?php
            if (isset($_SESSION['username'])) {
                $usr = $_SESSION['username'];
                $sql = "SELECT role FROM profiles WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$usr]);
                $data = $stmt->fetch()['role'];
                if ($data == 0) { 
                    include "adminmenu.php";
                }
            }
            ?>
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