<?php

function addVisitor() {
  
    $ip = $_SERVER['REMOTE_ADDR'];
    $has_visited = false;
    $visitors = file("../visitors.txt");

    foreach ($visitors as $v) {
        $file_ip = explode(" / ", $v)[0];
        if ($ip == $file_ip) {
            $has_visited = true;
        } 
    }

    if(!$has_visited) {
        $visitorfile = fopen("../visitors.txt", "a+") or die("Unable to open file!");

        date_default_timezone_set('Europe/Helsinki');
        $time = date("d/m/Y H:i");

        $visitor = $ip." / ".$time."\n";
        fwrite($visitorfile, $visitor);

        fclose($visitorfile);
    }
}
?>