<?php

require_once 'a.class.user.php';

$user = new USER();



if(empty($_GET['id']) && empty($_GET['code']))

{

    $user->redirect('a.index.php');

}



if(isset($_GET['id']) && isset($_GET['code']))

{

    $id = base64_decode($_GET['id']);

    $code = $_GET['code'];



    $statusY = "Y";

    $statusN = "N";



    $stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_users WHERE userID=:uID AND tokenCode=:code LIMIT 1");

    $stmt->execute(array(":uID"=>$id,":code"=>$code));

    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowCount() > 0)

    {

        if($row['userStatus']==$statusN)

        {

            $stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");

            $stmt->bindparam(":status",$statusY);

            $stmt->bindparam(":uID",$id);

            $stmt->execute();



            $msg = "

		           <div class='alert alert-success'>

				   <button class='close' data-dismiss='alert'>&times;</button>

					  <strong>WoW !</strong>  Your Account is Now Activated : <a href='a.index.php'>Login here</a>

			       </div>

			       ";

        }

        else

        {

            $msg = "

		           <div class='alert alert-error'>

				   <button class='close' data-dismiss='alert'>&times;</button>

					  <strong>sorry !</strong>  Your Account is allready Activated : <a href='a.index.php'>Login here</a>

			       </div>

			       ";

        }

    }

    else

    {

        $msg = "

		       <div class='alert alert-error'>

			   <button class='close' data-dismiss='alert'>&times;</button>

			   <strong>sorry !</strong>  No Account Found : <a href='a.signup.php'>Signup here</a>

			   </div>

			   ";

    }

}



?>

<!DOCTYPE html>

<html>

<head>

    <title>Confirm Registration</title>



    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>

<body id="login">



<?php if(isset($msg)) { echo $msg; } ?>



</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:39
 */