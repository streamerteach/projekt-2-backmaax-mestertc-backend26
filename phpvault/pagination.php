<?php
include "sort-adds.php";

$res_per_page = 5;


if ($mypreference == 3) {
    $stmt = $conn->prepare($amountcheck);
    $stmt->bindValue(1, 3, PDO::PARAM_INT);
    $stmt->execute();
    $tot_res = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    $pages = ceil($tot_res/$res_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $page = max(1, min($page, $pages));
    $startpoint = ($page - 1) * $res_per_page;

    $stmt = $conn->prepare($baseset);
    $stmt->bindValue(1, 3, PDO::PARAM_INT);
    $stmt->bindValue(2, $startpoint, PDO::PARAM_INT);
    $stmt->bindValue(3, $res_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $conn->prepare($amountcheck);
    $stmt->bindValue(1, $mygender, PDO::PARAM_INT);
    $stmt->bindValue(2, 3, PDO::PARAM_INT);
    $stmt->bindValue(3, $mypreference, PDO::PARAM_INT);
    $stmt->execute();
    $tot_res = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    $pages = ceil($tot_res/$res_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $page = max(1, min($page, $pages));
    $startpoint = ($page - 1) * $res_per_page;

    $stmt = $conn->prepare($baseset);
    $stmt->bindValue(1, $mygender, PDO::PARAM_INT);
    $stmt->bindValue(2, 3, PDO::PARAM_INT);
    $stmt->bindValue(3, $mypreference, PDO::PARAM_INT);
    $stmt->bindValue(4, $startpoint, PDO::PARAM_INT);
    $stmt->bindValue(5, $res_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

