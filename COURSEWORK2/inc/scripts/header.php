<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Photo Upload Commenter (SPUC)</title>
    <link rel="stylesheet" href="style/style.css">

</head>

<body>
<header>
    <h1>Student Photo Upload Commenter (SPUC)</h1>
    <nav>
        <ul>
            <li><a href="./">Home Page</a></li>
            <li><a href="blog">Disclaimer</a></li>
            <li><a href="about">About Me</a></li>
            <li><a href="contactus">Contact Me</a></li>
            <li><a href="signup">Sign-Up</a></li>
            <?
            if (isset($_SESSION['username'])) {
                echo "<li><a href='Uploadphotos'>Upload Photos</a></li>";
                echo "<li><a href='logout'>Logout</a></li>";
            } else {
                echo "<li><a href='login'>Login</a></li>";
            }
            ?>

        </ul>
    </nav>
</header>
