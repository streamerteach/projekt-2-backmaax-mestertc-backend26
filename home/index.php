<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<?php include "../phpvault/visitoradder.php"?>
<?php include "../phpvault/visitoramount.php"?>

<body>
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
            
            <?php include "../phpvault/adds.php"?>

        </div>
        <div id="addfield">
            <div class="subfield">
                <div class="adds" id="add-1">
                    <a class="add"><img></a>
                </div>
                <div class="adds" id="add-2">
                    <a class="add"><img></a>
                </div>
                <div class="adds" id="add-3">
                    <a class="add"><img></a>
                </div>
                <div class="adds" id="add-4">
                    <a class="add"><img></a>
                </div>
            </div>
            
            <div class="subfield">
                <div class="adds" id="add-5">
                    <a class="add"><img src="../Fileupload/Profilepictures/dennis.jpg" alt="dennis" width="180" height="202"></a>
                </div>
                <div class="adds" id="add-6">
                    <a class="add"><img></a>
                </div>
                <div class="adds" id="add-7">
                    <a class="add"><img></a>
                </div>
                <div class="adds" id="add-8">
                    <a class="add"><img></a>
                </div>
            </div>
        </div>
        <div id="page-turner">
            <div class="turner-element"><img></div>
            <div class="turner-element" id="page-number"></div>
            <div class="turner-element"><img></div>
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