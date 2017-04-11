<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
$upload0K = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) { 
        echo "File is an image - " . $check["mine"] . ".";
        $upload0K = 1;
    } else { 
        echo "file is not an image.";
        $upload0K = 0;
    }
}
?>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 11/04/2017
 * Time: 14:59
 */ 