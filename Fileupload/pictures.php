<?php

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    $target_dir    = $_SESSION['path']."/current/";
    $oldDir        = $_SESSION['path']."/old/";
    
   
    $uploadOk      = 1;

       // Generate safe unique filename
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
    $newFileName = uniqid("img_", true) . "." . $imageFileType;
    $target_file = $target_dir . $newFileName;


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
        
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "webp") {
        echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {

// Move old profile picture to /old
    $existingFiles = array_diff(scandir($target_dir), ['.', '..']);
    foreach ($existingFiles as $file) {
        rename($target_dir . $file, $oldDir . $file);
    }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

    }
}



if (isset($_GET['restore'])) {

  
    $currentDir = $_SESSION['path']."/current/";
    $oldDir     = $_SESSION['path'] . "/old/";

    $file = basename($_GET['restore']); // security

    $oldFilePath     = $oldDir . $file;
    $currentFiles    = array_diff(scandir($currentDir), ['.', '..']);

    // Move current PFP to /old
    foreach ($currentFiles as $currentFile) {
        rename($currentDir . $currentFile, $oldDir . $currentFile);
    }

    // Move selected old image back to /current
    if (file_exists($oldFilePath)) {
        rename($oldFilePath, $currentDir . $file);
        header("Refresh:1; url=../profile/");
        }
}
  


    
//Print out uploaded file
/*        

$dir   = $_SESSION['path']."/current/";
        $files = array_diff(scandir($dir), ['.', '..']);
            if(empty($files[2])){
                echo '<img src="../Fileupload/default.jpg" width="300" height="300">';
            }
            else{
                echo '<img src="'.$dir.end($files).'" width="300" height="300">';
        }

*/