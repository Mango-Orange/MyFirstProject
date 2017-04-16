<?php





session_start();

require_once 'a.class.user.php';

$user_home = new USER();



if(!$user_home->is_logged_in())

{

    $user_home->redirect('a.index.php');

}



$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");

$stmt->execute(array(":uid"=>$_SESSION['userSession']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);



$path = $row['userID'];



if (! is_dir($path)) {

    mkdir('./CourseworkPHP/'.$path);



}







$target_dir ="CourseworkPHP/".$path. "/";

$target_file = $target_dir . "/". $path. ".jpeg";

$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

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

if ($_FILES["fileToUpload"]["size"] > 500000) {

    echo "Sorry, your file is too large.";

    $uploadOk = 0;

}

// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

    && $imageFileType != "gif" ) {

    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file

} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        header('location: a.home.php');



    } else {

        echo "Sorry, there was an error uploading your file.";

    }

}



?>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:39
 */