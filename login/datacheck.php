<?php

if (!empty($_POST['username'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
   
    if($username == "backmaax" or $username == "mestertc") {
        if($username == "backmaax" and $password == "hemlis") {
            print("Welcome back ".$username."!");
            $_SESSION['username'] = $username;
            header("Refresh:3; url=../home/");
        } else if ($username == "mestertc" and $password == "hemlis2") {
            print("Welcome back ".$username."!");
            $_SESSION['username'] = $username;
            header("Refresh:3; url=../home/");
        } else {
            print("<p id=\"incorrect\">Incorrect username or password!</p>");
        }
    } else {
        print("<p id=\"incorrect\">Incorrect username or password!</p>");
    }
}
?>