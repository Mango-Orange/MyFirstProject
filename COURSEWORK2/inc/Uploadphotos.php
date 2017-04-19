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

            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="Submit">
            </form>

            </body>
            </html> 

        </main>

        <?

        include("scripts/footer.php");

    




