<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<?php include "../phpvault/visitoradder.php"?>
<?php include "../phpvault/visitoramount.php"?>

<body>
  <script src="../Script/chat2.js"></script>
    <?php include "../phpvault/menu.php"?>
    
    <section id="main-container">
        <div class="content">
            <h1>Home</h1>
            <?php include "../phpvault/today.php"?>
            
            
            <?php
            if (isset($_SESSION['username'])) {
                addVisitor();
                include "../phpvault/Timer.php";
                print("<p>Welcome ".$_SESSION['username']."!</p>");
                if (isset($_COOKIE['lastvisit-cookie'])) {
                    print("<p>You were last logged in on ".$_COOKIE['lastvisit-cookie']."!</p>");
                } else {
                    print("<p>This is your first visit to this site!</p>");
                }
            } else {
                print("<p>Please log in to access your homepage!</p>");
            }
            
            ?>

        </div>

        <?php
        if (isset($_SESSION['username'])) {
            include "../phpvault/ad-structure.php";
        }
        ?>
        <div id="chatSidebar">
            <h3>Your Chats</h3>
        </div>
        <div id="chatPopup">
            <div id="chatHeader">Chat <span style="float:right;cursor:pointer;" onclick="closeChat()">X</span></div>
            <div id="chatMessages"></div>
            <div id="chatInput">
            <input type="text" id="msgInput" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>
        <footer class="content">
            <?php 
            if (isset($_SESSION['username'])) {
                print(getVisitorAmount()." people are using our site!");
            }
            ?>
        </footer>
    </section>
    <script url="../Script/pagecount.js"></script>
</body>
</html>