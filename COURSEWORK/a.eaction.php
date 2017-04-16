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

$User_name = $row['userName'];

$image = $row['userID'];



$imagename ="CourseworkPHP/". $path ."/".$image.".jpeg";


unlink($imagename);

//header('location: form.php?sbm_bt4=Next');



?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Create Profile</title>

</head>

<body>

<div id="page">

    <header>

        <link href="a.profilestyle.css" type="text/css" rel="stylesheet">

        <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

        <h1 id="title">SPUC</h1>

    </header>

    <main>

        <h2> Change Profile Picture</h2>



        <fieldset>

            <legend>Upload picture</legend><br />

            <form action="a.upload.php" method="post" enctype="multipart/form-data">

                Select image to upload:

                <input type="file" name="fileToUpload" id="fileToUpload">

                <input type="submit" value="Upload Image" name="submit">



        </fieldset>

        </form>
        

    </main>

    <footer>

        <p>copyright Team D</p>

    </footer>

</div>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:32
 */