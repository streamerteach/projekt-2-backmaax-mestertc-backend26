

<?php

function AddLike($id, $conn) {
    $sql = "SELECT likes FROM profiles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $likes = $stmt->fetchColumn();

    $sql = "UPDATE profiles SET likes = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$likes + 1, $id]);

    $_SESSION['liked'][$id] = true;
}

function GetLikes($id) {
    $sql = "SELECT likes FROM profiles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
}

