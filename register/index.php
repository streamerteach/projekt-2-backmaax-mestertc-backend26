<?php include "../phpvault/Methods.php" ?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<?php include "../phpvault/header.php"?>
<body>
    <?php include "../phpvault/menu.php"?>
    <section id="main-container">
        <div class="content">
            <h1>Register here</h1>

            <form action="index.php" method="POST">
                <input type="hidden" name="form" value="submitted">
                Username:   <br><input type="text" name="username"><br>
                First Name: <br><input type="text" name="firstname"><br>
                Last Name: <br><input type="text" name="lastname"><br>
                E-mail:     <br><input type="email" name="email"><br>
                Zipcode:    <br><input type="zipcode" name="zipcode"><br>
                Salary:     <br><input type="number" name="salary"><br>
                <label for="preference">Choose a preference:</label><br>
                <select name="preference" id="preference">
                    <option value="1">Men</option>
                    <option value="2">Women</option>
                    <option value="3">Both</option>
                    <option value="4">Other</option>
                </select><br> 
                Bio:        <br><input type="text" name="bio"><br><br>
                                <input type="submit" value="Register">
            </form>
            <?php include "./register.php" ?>
        </div>
    </section>
</body>