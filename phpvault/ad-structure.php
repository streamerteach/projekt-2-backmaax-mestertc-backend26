
<?php include "sort-adds.php"?>

<div id="addfield">

    <?php
    if (!empty($baseset)) {
        include "pagination.php";
        foreach ($profiles as $profile) {
            print("<div class=\"adds\">");
            print("<img src=\"../Fileupload/Profilepictures/dennis.jpg\" alt=\"".$profile['realname']."\" style=\"width:100%\">");
            print("<h1>".$profile['realname']."</h1>");
            print("<p class=\"title\">".$profile['bio']."</p>");
            print("<p><button>Contact</button></p>");
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