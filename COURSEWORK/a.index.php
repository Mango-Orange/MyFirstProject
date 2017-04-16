<?php

session_start();

require_once 'a.class.user.php';

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



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>SPUC</title>

</head>

<body>





<?php

if(isset($_GET['inactive']))

{







    echo'Sorry! This Account is not Activated Go to your Inbox and Activate it.';





}

?>

</head>

<body>

<div id="page">

    <header>

        <link href="a.authstyle.css" type="text/css" rel="stylesheet">

        <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

        <h1 id="title">SPUC</h1>

    </header>

    <main>

        <img src="isle of skye.jpg" width="400" height="300" alt="isle of skye">

    </main>

    <aside><?php

        if(isset($_GET['error']))

        {

            echo 'Wrong Details!';



        }

        ?>

        <form action="" method="post">

            <fieldset>

                <legend>Login</legend>

                <label class="label username">RGU Email</label>

                <input class="input username" type="text" name="txtemail" />

                <label class="label password">Password</label>

                <input class="input password" type="password" name="txtupass" />

                <input id="submit" type="submit" value="submit" name="btn-login" />

                <p class="newUser">New User? You can sign up <a href="signup.php"> here </a></p>

                <p class="forgotpw">Forgot your password? Click <a href="fpass.php"> here </a></p>

            </fieldset>

        </form>

    </aside>
    
</div>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:33
 */