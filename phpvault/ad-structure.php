<?php include "pagination.php"?>
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
            print("<p><button onclick='startChat(".$profile['id'].")'>Contact</button></p>");
            print("</div>");
        }
    } else {
        print("<h1>There seems to be no matches for you!</h1>");
    }
    ?>
    
    
</div>
<div id="page-turner">
    <button class="turner-element"><</button>
    <div id="page-number">
    </div>
    <button class="turner-element">></button>
</div>
