<?php include "../phpvault/Methods.php"?>
<?php include "../phpvault/header.php"?>
<?php include "../phpvault/consensualcookie.php"?>
<body>
    <?php include "../phpvault/menu.php"?>
    <?php include "./model_account.php"?>
    <section id="main-container">
    

    <div id="Account">
        
    <form action="./edit_account.php" method="POST">
                <input type="hidden" name="form" value="submitted">
                Real Name: <br><input type="text" name="realname" value="<?=$row['realname']?>"><br>
                Gender: <br><select name="gender" id="gender">
                    <option value = ""> --Gender--</option>
                    <option value="1">Man</option>
                    <option value="2">Woman</option>
                    <option value="3">Other</option>
                    </select><br>
                E-mail:     <br><input type="email" name="email" value="<?=$row['email']?>"><br>
                Zipcode:    <br><input type="zipcode" name="zipcode" value="<?=$row['zipcode']?>"><br>
                Salary:     <br><input type="number" name="salary" value="<?=$row['salary']?>"><br>
                <label for="preference">Choose a preference:</label><br>
                <select name="preference" id="preference">
                    <option value = ""> --Choose preference--</option>
                    <option value="1">Men</option>
                    <option value="2">Women</option>
                    <option value="3">Both</option>
                    <option value="4">Other</option>
                </select><br> 
                Bio:        <br><input type="text" name="bio" value="<?=$row['bio']?>"><br>
                Provide Password to edit profile:   <br><input type="password" name="password"><br><br>
                                <input type="submit" value="Submit changes">
                                <?php if(!empty($_REQUEST['password'])){
                                    updateAccount($conn, $row);
                                }?>
    </form>
</section>
</body>