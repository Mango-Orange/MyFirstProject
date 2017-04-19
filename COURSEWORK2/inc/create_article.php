<?php

session_start();

if (isset($_SESSION['username'])) //SESSION DOES EXIST

{

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {



        include("scripts/header.php");

        ?>

        <main>

            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

            <script>tinymce.init({selector: 'textarea'});</script>

            <form action="create_article" method="post"> 

                <input type="text" name="articleName" placeholder="Article Name">

                <textarea name="articleText"></textarea>

                <input type="submit">

            </form>

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