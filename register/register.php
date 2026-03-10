

<?php
if(!empty($_REQUEST['form'])){
    $username = test_input($_REQUEST['username']);
    $firstname = test_input($_REQUEST['firstname']);
    $lastname = test_input($_REQUEST['lastname']);
    $email = test_input($_REQUEST['email']);
    $zipcode = test_input($_REQUEST['zipcode']);
    $salary = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['preference']);
    $bio = test_input($_REQUEST['bio']);
    $pwd = generate_rand_pwd(8);
    $msg= mail_pwd($username, $pwd,$email);
    // print($msg); //for testing purpose
    
    if (!empty($username) and !empty($firstname) and !empty($lastname) and !empty($email) 
        and !empty($zipcode) and !empty($salary) and !empty($preference) and !empty($bio) and !empty($pwd)) {
        $sql = "INSERT INTO `profiles` (`id`, `username`, `realname`, `zipcode`, `bio`, `salary`, `preference`, `email`, `likes`, `role`, `passhash`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, "$firstname $lastname", $zipcode, $bio, $salary, $preference, $email, 0, 1, password_hash($pwd, PASSWORD_DEFAULT)]);
        print("<p id=\"incorrect\">Your account was successfully created, we've sent your<br>randomly generated password to the given e-mail address!</p>");
    } else {
        print("<p id=\"incorrect\">Something went wrong! Please check that all fields above have been filled!</p>");
    }  
}

function generate_rand_pwd ($char){

    /*String containing allowed chars */
    $sample = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($sample), 0, $char);
}

function mail_pwd($username,$pwd,$email){
    $msg = "Thank you for registering to Pink Dates. \n
            You have registered using ".$username.". \n
            Your password is: ".$pwd.", please remeber to change it! \n
            This is an automated message, do not reply";
    mail($email, "Thank you for registering",$msg );
    return( $msg);   //for testing
}
?>