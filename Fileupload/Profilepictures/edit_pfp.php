<?php

<div class="profile-container">

    <!-- Current Profile Picture -->
    <div class="current-pfp">
    <h3>Current Profilepicture</h3>
        <?php
        $dir = $_SESSION['path'] . "/current/";
        $files = array_diff(scandir($dir), ['.', '..']);

        if (empty($files)) {
            echo '<img src="../Fileupload/default.jpeg">';
        } else {
            $file = array_values($files)[0];
            echo '<img src="' . $dir . $file . '">';
        }
        ?>
    </div>

    <!-- Old Profile Pictures Grid -->
    <div class="old-pfp-grid">
        <?php
        $oldDir = $_SESSION['path'] . "/old/";
        $oldFiles = array_diff(scandir($oldDir), ['.', '..']);

        foreach ($oldFiles as $file) {
            echo '<a href="?restore=' . urlencode($file) . '">';
            echo '<img src="' . $oldDir . $file . '">';
            echo '</a>';
        }
        ?>
    </div>