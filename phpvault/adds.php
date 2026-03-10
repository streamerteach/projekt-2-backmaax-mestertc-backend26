<?php

function nextPage($page_nr) {
    $page_nr += 1;
}

function backPage($page_nr) {
    $page_nr -= 1;
}




if (isset($_GET['action']) and $_GET['action'] == "nP"){
    nextPage($page_nr);
} elseif (isset($_GET['action']) and $_GET['action'] == "bP") {
    backPage($page_nr);
}

?>