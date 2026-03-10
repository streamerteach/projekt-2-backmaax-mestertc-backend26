<?php
$username = $_SERVER['REMOTE_USER'];
$cookie_name = $username;

if (isset($_COOKIE[$cookie_name]) and isset($_COOKIE['lastvisit-cookie'])) {
    print("Welcome back ".$username."! ");
    print("Your first visit was ".$_COOKIE[$cookie_name]."!");
    
} else { 
    setcookie($cookie_name, date("d/m/Y"), time() + (86400 * 30), "/");
}
?>