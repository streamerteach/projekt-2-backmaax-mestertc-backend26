<?php

if (! empty($_REQUEST['password'])) {
   
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $sql = "SELECT id, username, passhash FROM profiles WHERE username = ?";
    $stmt = $conn -> prepare($sql);
    
    if($stmt ->execute([$username])){
        $user = $stmt-> fetch();

        if($user && password_verify($password, $user['passhash'])){
            print("<p> Logging in </p>");
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Refresh:2; url=../home");
        }
        else{
            print( "Wrong Username or password");
        }
    }


    else {
        print("Server Error");
    }
}
