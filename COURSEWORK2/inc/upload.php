<?php

$target_dir = "./COURSEWORK2/uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);

echo "file:".$_FILES["fileToUpload"]["name"];

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);


    if($check !== false) {

        echo "File is an image - " . $check["mime"] . ".";

        $uploadOk = 1;

    } else {

        echo "File is not an image.";

        $uploadOk = 0;

    }

}

// Check if file already exists

if (file_exists($target_file)) {

    echo "Sorry, file already exists.";

    $uploadOk = 0;

}

// Check file size

if ($_FILES["fileToUpload"]["size"] > 2000000) {

    echo "Sorry, your file is too large.";

    $uploadOk = 0;

}

// Allow certain file formats

if($imageFileType != "jpg" and $imageFileType != "png" and $imageFileType != "jpeg" and $imageFileType != "gif" ) {

    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. Your file type was:".$imageFileType."<br>";

    $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file

} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file ". basename( $_FILES["fileToUpload"]["name"] ). " has been uploaded.";

        // header('location: home.php');



    } else {

        echo "Sorry, there was an error uploading your file."."<br>";
        echo "File:".$_FILES["fileToUpload"]["tmp_name"]."<br>";
        echo "Target:".$target_file;

    }

}



?>