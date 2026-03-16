<?php include "../Chat/model_comments.php";?>


<?php foreach ($rows as $row): ?>
<div class="comment">


<h3><?=$row['username'] ?> commented:</h3>
<p><?= $row['comment']?></p>

    <form method="POST" action="./index.php">
        <input type="hidden" name="receiver_id" value="<?= $row['sender_id'] ?>">
        <input type="text" name="comment" placeholder="Reply to <?= htmlspecialchars($row['username']) ?>">
        <button type="submit">Send</button>
    </form>

</div>

<?php endforeach; ?>

