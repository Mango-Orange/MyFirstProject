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







$id= $_GET['id'];

$imagename ="CourseworkPHP". $id ."/".$id.".jpeg";



$pic ='<img src="' . $imagename .' "width="150" height="150">';

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



$title= $_GET['id'];



$query=mysql_query("SELECT members.member_ID, f_name, username, gender, dob, study_level, religion, nationality, ethnic, height, m_status, 				interest.sexual_orientation, interest.hobby, interest.looking_for, course.course_name, course.department, course.start_date, course.end_date

							  FROM members, interest, course

							   WHERE members.member_ID =$title ");







$line=mysql_fetch_array($query);

$id  = $line['member_ID'];

$f_name  = $line['f_name'];

$username  = $line['username'];

$gender = $line['gender'];

$dob  = $line['dob'];

$study_level = $line['study_level'];

$religion = $line['religion'];

$nationality = $line['nationality'];

$ethnic = $line['ethnic'];

$height = $line['height'];

$m_status = $line['m_status'];

$course_name = $line['course_name'];

$sexual_orientation = $line['sexual_orientation'];

$looking_for  = $line['looking_for'];

$hobby  = $line['hobby'];

$department  = $line['department'];

$start_date  = $line['start_date'];

$end_date  = $line['hobby'];









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

        <h1 id="title">SPUC</h1>

    </header>

    <main>

        <div id="first2">



            <?php

            echo <<<ENDHTML

   

  

   <h3 align="center"><em >$pic</em></h3>

   <hr />

   

   <table cellpadding="2" cellspacing="2"

    style="width: 101.5%; margin-left: auto; margin-right: auto;">

    <tr>

     <td style="background-color:#f4f5f5"><strong>Name</strong></strong></td>

     <td style="background-color:#f4f5f5">$f_name</td>

     <td style="background-color:#f4f5f5"><strong>Gender</strong></strong></td>

     <td style="background-color:#f4f5f5">$gender</td>

    </tr><tr>

     <td style="background-color:#d9dddd"><strong>Level of Study</strong></td>

     <td style="background-color:#d9dddd">$study_level</td>

     <td style="background-color:#d9dddd"><strong>Sexual Orientation</strong></td>

     <td style="background-color:#d9dddd">$sexual_orientation<td/>

    </tr><tr>

     <td style="background-color:#f4f5f5"><strong>Nationality</strong></td>

     <td style="background-color:#f4f5f5">$nationality</td>

     <td style="background-color:#f4f5f5"><strong>Date of Birth</strong></td>

     <td style="background-color:#f4f5f5">$dob<td/>

    </tr><tr>

     <td style="background-color:#d9dddd"><strong>Ethnicity</strong></td>

     <td style="background-color:#d9dddd">$ethnic</td>

     <td style="background-color:#d9dddd"><strong>Hobby</strong></td>

     <td style="background-color:#d9dddd">$hobby<td/>

    </tr><tr>

     <td style="background-color:#f4f5f5"><strong>Looking for</strong></td>

     <td style="background-color:#f4f5f5">$looking_for</td>

     <td style="background-color:#f4f5f5"><strong>Religion</strong></td>

     <td style="background-color:#f4f5f5">$religion<td/>

    </tr><tr>

     <td style="background-color:#d9dddd"><strong>height</strong></td>

     <td style="background-color:#d9dddd">$height</td>

	 <td style="background-color:#d9dddd"><strong>Marital Status</strong></td>

     <td style="background-color:#d9dddd">$m_status</td>

	 </tr><tr>

     <td style="background-color:#d9dddd"><strong>Department</strong></td>

     <td style="background-color:#d9dddd">$department</td>

	 <td style="background-color:#d9dddd"><strong>Course Start Date</strong></td>

     <td style="background-color:#d9dddd">$start_date</td>

	 

    </tr>

   </table>

    

   <hr />

  



ENDHTML;



            echo <<<ENDHTML

  

ENDHTML;

            ?>

            <a href="#"  class="link">Connect</a>

    </main>

     

</div>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:34
 */