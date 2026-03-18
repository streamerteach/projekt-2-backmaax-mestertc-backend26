<?php include "likes.php"?>
<?php include "sort-adds.php"?>
<?php include "pagination.php"?>

<div id="addfield">

    <?php
    if (!empty($baseset)) {
        
        foreach ($profiles as $profile) {
            if (!isset($_SESSION['liked']) || !is_array($_SESSION['liked'])) {
                $_SESSION['liked'][$profile['id']] = false;
            }

            

            if (isset($_POST['likeButton']) and !$_SESSION['liked'][$profile['id']]) {
                AddLike($profile['id'], $conn);
            }

            print("<div class=\"adds\">");
            print("<img src=\"../Fileupload/Profilepictures/dennis.jpg\" alt=\"".$profile['realname']."\" style=\"width:100%\">");
            print("<h1>".$profile['realname']."</h1>");
            print("<p class=\"title\">".$profile['bio']."</p>");
            print("<p><button onclick='startChat(".$profile['id'].")'>Contact</button></p>");
            print("<form method=\"POST\">");

            if (!isset($_POST['likeButton'])) {
                print("<p><button type=\"submit\" name=\"likeButton\">Like</button></p>");
            }
            print("</form>");

            print("<p>".$profile['realname']." has been liked ".$profile['likes']." times!</p>");
            print("</div>");
        }
    } else {
        print("<h1>There seems to be no matches for you!</h1>");
    }
    ?>
    
    
</div>
<div id="page-turner">
    <?php if ($page > 1) {?>
        <a href="?page=<?php print($page - 1);?>"><</a>
    <?php } ?>

    <?php for ($i = 1; $i <= $pages; $i++) {?>
        <a href="?page=<?php print($i);?>"><?php print($i); ?></a>
    <?php } ?>

    <?php if ($page < $pages) {?>
        <a href="?page=<?php print($page + 1);?>">></a>
    <?php } ?>
</div>
