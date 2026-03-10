<?php
$consensual_cookie = 'consent-cookie';

if (isset($_POST['cookie_choice'])) {
    setcookie($consensual_cookie, $_POST['cookie_choice'], time() + (86400 * 30));
    $_COOKIE[$consensual_cookie] = $_POST['cookie_choice'];
}
?>