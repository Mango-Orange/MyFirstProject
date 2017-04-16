<?php

//including the database connection file

include_once("dbconnect.php");



//fetching data in descending order (lastest entry first)

//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated

$result = mysqli_query($mysqli, "SELECT * FROM tbl_users ORDER BY userID DESC"); // using mysqli_query instead

?>

<?php

session_start();

require_once '../a.class.user.php';

$user_login = new USER();



if($user_login->is_logged_in()!="")

{

    $user_login->redirect('a.home.php');

}



if(isset($_POST['btn-login']))

{

    $email = trim($_POST['txtemail']);

    $upass = trim($_POST['txtupass']);



    if($user_login->login($email,$upass))

    {

        $user_login->redirect('a.home.php');

    }

}

?>

<html>

<head>

    <title>Admin Page</title>

</head>



<body>

<br />



<h2> Users Management Area</h2>

<a href="../a.logout.php">Logout</a>

<hr />

<table width='80%' border=0>



    <tr bgcolor='#CCCCCC'>

        <td>Name</td>

        <td>User Status</td>

        <td>Email</td>

        <td>Update</td>

    </tr>

    <?php


    }

    ?>

</table>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 16:10
 */