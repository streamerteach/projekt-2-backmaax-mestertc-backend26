<?php
include "sort-adds.php";

$res_per_page = 5;

$sql = "SELECT COUNT(*) AS total FROM profiles";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tot_res = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$pages = ceil($tot_res/$res_per_page);

if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
    $_GET["page"] = $page;
}

$page = max(1, min($page, $pages));

$startpoint = ($page - 1) * $res_per_page;

$stmt = $conn->prepare($baseset);
$stmt->execute([$mygender, $mypreference]);
$stmt->bindValue(':startpoint', $startpoint, PDO::PARAM_INT);
$stmt->bindValue(':res_per_page', $res_per_page, PDO::PARAM_INT);
$stmt->execute([$mygender, $mypreference]);
$profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
