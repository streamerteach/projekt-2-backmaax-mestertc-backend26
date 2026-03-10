

<?php
date_default_timezone_set('Europe/Helsinki');
setcookie('lastvisit-cookie', date("d/m/Y H:i"), time() + (86400 * 30), "/");
session_start();
session_destroy();
header("Refresh:1; url=../login/");
exit;
?>