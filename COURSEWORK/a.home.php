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

$image = $row['userID'];

$username = $row['userName'];

$imagename ="CourseworkPHP/". $path ."/".$image.".jpeg";







include "a.db.php";

$result=mysql_query("SELECT *

							  FROM interest

							   WHERE member_ID='{$path}' limit 1");

$found=mysql_num_rows($result);

$row1=mysql_fetch_array($result);

$profile_var=$row1["profile"];







if($row1["profile"]==="Y"){

    $profile ='<a href="a.edit.php">update profile</a>';



}else{





    $profile ='<a href="a.form.php">create profile</a>';

}

$interested=mysql_query("SELECT *

							  FROM interest

							   WHERE member_ID='{$path}' limit 1");



$lines=mysql_fetch_array($interested);

$path1 = $profile_var=$lines["sexual_orientation"];









$result1=mysql_query("SELECT member_ID FROM interest  WHERE sexual_orientation='{$path1}'

								ORDER BY RAND()

	

									LIMIT 3");













?>





<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Home Page</title>

</head>

<body>

<div id="page">

    <ul id="topBar">

        <li><p>User:<?php echo $username; ?></p></li> <!--this should show logged in user's username-->

        <li><p>Status: Online</p></li><!--This should show login status-->

        <li class="right"><a href="a.logout.php">Log out</a></li>

    </ul>

    <header>

        <link href="a.homepagestyle.css" type="text/css" rel="stylesheet">

        <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

        <h1 id="title">Campus Dating</h1>

    </header>

    <main>

        <div id="first2">

            <li><a href="a.profile.php?id=<?php echo $path; ?>"><img src="<?php echo ($imagename); ?>" alt="myProfileIcon" width="20%" height="15%"></a><?php echo $username; ?>



            </li>



            <li><a href="a.index.php"><img src="CourseworkPHP/Couple%20Man%20Woman-96-search.png" alt="searchIcon">Search for people</a></li>

        </div>

        <div id="second2">

            <li><a href="CourseworkPHP/Couple%20Man%20Woman-96-search.png">Upload images</a>

            <li><a href="CourseworkPHP/Couple%20Man%20Woman-96-search.png">View images</a></li>

        </div>


    </main>
    
    

</div>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:32
 */