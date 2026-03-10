<?php
function getVisitorAmount() {
    $visitors = file("../visitors.txt");
    return count($visitors);
}
?>

