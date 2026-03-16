<?php include "../Chat/model_comments.php";?>
<h3>User <?=$row['username']?> commented:</h3>
<p><?= $row['comment']?></p>

<!-- ToDo  use row[comment] printing out comments-->
<form action="./profile.php" method="post">
    <input type="text" name="reply" placeholder="Your reply..."> <br>
    <input type="submit" value="Reply"><br>
</form>


