<?php

session_start();

require_once 'a.class.user.php';



$reg_user = new USER();



if($reg_user->is_logged_in()!="")

{

    $reg_user->redirect('a.home.php');

}





if(isset($_POST['btn-signup']))

{

    $uname = trim($_POST['txtuname']);

    $email = trim($_POST['txtemail']);

    $upass = trim($_POST['txtpass']);

    $code = md5(uniqid(rand()));



    $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");

    $stmt->execute(array(":email_id"=>$email));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);



    if($stmt->rowCount() > 0)

    {

        $msg = "

		      <div class='alert alert-error'>

				<button class='close' data-dismiss='alert'>&times;</button>

					<strong>Sorry !</strong>  email allready exists , Please Try another one

			  </div>

			  ";

    }

    else

    {

        if($reg_user->register($uname,$email,$upass,$code))

        {

            $id = $reg_user->lasdID();

            $key = base64_encode($id);

            $id = $key;



            $message = "					

						Hello $uname,

						<br /><br />

						Welcome to SPUC!<br/>

						To complete your registration  please , just click following link<br/>

						<br /><br />

						<a href='http://alexapp04.azurewebsites.net/a.verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>

						<br /><br />

						Cheers,";



            $subject = "Confirm Registration";



            $reg_user->send_mail($email,$message,$subject);

            $msg = "

					<div class='alert alert-success'>

						<button class='close' data-dismiss='alert'>&times;</button>

						<strong>Success!</strong>  We've sent an email to $email.

                    Please click on the confirmation link in the email to create your account. 

			  		</div>

					";

        }

        else

        {

            echo "sorry , Query could no execute...";

        }

    }

}

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <title>Email Verification</title>

</head>

<body>





<?php

if(isset($_GET['inactive']))

{







    echo'Sorry! This Account is not Activated Go to your Inbox and Activate it.';





}

?>

<div id="page">

    <header>

        <header>

            <link href="a.emailverstyle.css" type="text/css" rel="stylesheet">

            <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

            <h1 id="title">SPUC</h1>

        </header>

        <main>

            <form class="form-signin" method="post">



                <?php if(isset($msg)) echo $msg;  ?>

                <fieldset>

                    <legend>Sign up</legend>

                    <label class="lavel" for="username">Username: </label><br />

                    <input class="input" type="text" class="input-block-level"  name="txtuname" required /><br/>



                    <label class="lavel" for="password">RGU Email: </label><br/>

                    <input class="input" type="email"  name="txtemail" required /><br />



                    <label class="lavel" for="password">Password: </label><br/>

                    <input class="input" type="password" name="txtpass" required /> <br/>



                    <label class="lavel" for="submit"></label>

                    <button class="submit" type="submit" name="btn-signup">Sign Up</button>

                    &nbsp; <a href="index.php">Sign In</a>

                </fieldset>

                <br />

                <label for="tandc">I accept the <a href="Terms and Conditions page">Terms and Conditions</a> and

                    <a href="Privacy Policy page">Privacy Policy</a></label>

                <input class="input" type="checkbox" name="tandc" value="accepted" checked="checked"/>

            </form>

        </main>

        <footer>

            <p>copyright Team D</p>

        </footer>

    </header>

</div>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:34
 */