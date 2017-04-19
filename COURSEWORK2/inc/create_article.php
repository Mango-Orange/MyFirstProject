<?php

session_start();

if (isset($_SESSION['username'])) //SESSION DOES EXIST

{

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {



        include("scripts/header.php");

        ?>

        <main>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Title</title>
            </head>
            <body>

            <form action="../upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="Submit">
            </form>

            </body>
            </html>

        </main>

        <?

        include("scripts/footer.php");

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        include ("scripts/ConnectToAzureDB.php");

        $articleID = str_replace(' ', '-', $_POST["articleName"]);

        $articleName = $_POST["articleName"];

        $articleText = $_POST["articleText"];

        $articleAuthor = $_SESSION['username'];



        $sql = "INSERT INTO blogArticles (articleID, articleName, articleText, articleAuthor) VALUES ('". $articleID ."', '" .$articleName."', '".$articleText."', '".$articleAuthor."')";



        if (mysqli_query($db, $sql)) {

        } else {

            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);

        }

        header("blog");

    }

//test

} else {

    header("location:login");

}

?>



