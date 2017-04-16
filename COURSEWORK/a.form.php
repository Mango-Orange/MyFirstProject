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

$User_name = $row['userName'];

$image = $row['userID'];



$imagename ="CourseworkPHP/". $path ."/".$image.".jpeg";







?>















<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Create Profile</title>

</head>

<body>

<?php







if (!isset($_GET['sbm_bt']) && !isset($_GET['sbm_bt2']) && !isset($_GET['sbm_bt4']) && $_SERVER['REQUEST_METHOD'] ==='GET'){

// execute if requested using HTTP GET Method

?>

<div id="page">

    <header>

        <link href="a.profilestyle.css" type="text/css" rel="stylesheet">

        <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

        <h1 id="title">SPUC</h1>

    </header>

    <main>

        <h2><strong>Basic information</strong></h2>

        <br />

        <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" >

            <fieldset>

                <legend>Create Profile Details</legend><br />

                <label class="label" for="firstName">Full name: </label>

                <input  class="input" type="text" name="f_name" required><br /> <br />

                <label class="label" for="u_name">Username: </label>

                <input class="input" type="text" name="u_name" value="<?php echo ($User_name); ?>" ><br /><br />

                <label class="label" for="dob">DoB: </label>

                <input  class="input" type="date" name="dob" /><br /><br />

                <label class="label" for="study_level">Level of Study: </label><br />

                <select class="input" name="study_level">

                    <option value="Select">--select--</option>

                    <option value="PhD">PhD</option>

                    <option value="Masters">Masters</option>

                    <option value="First Degree">First Degree</option>

                    <option value="Postgraduate Diploma">Postgraduate Diploma</option>

                    <option value="Diploma">Diploma</option>

                    <option value="other">Other</option>

                </select><br /><br />

                <label class="label" for="height">Height(in centimeters): </label>

                <input class="input" type="number" name="height" min="30" max="350" /><br /><br />

                <label class="label" for="gender">Gender: </label>

                <select  class="input" name="gender">

                    <option value="Male">Male</option>

                    <option value="Female">Female</option>

                </select><br /><br />

                <label class="label" for="nationaliy">Nationality: </label>

                <select class="input" name="nationality">

                    <option value="UK">UK</option>

                    <option value="Nigeria">Nigeria</option>

                    <option value="Australia">Australia</option>

                </select><br /><br />



                <label class="label" for="ethnicity">Ethnicity: </label><br />

                <select class="input" name="ethnic">

                    <option value="white">White</option>

                    <option value="Black-African">Black</option>

                    <option value="asian">Asian</option>

                    <option value="Indian">Indian</option>

                    <option value="notTell">Rather not tell</option>

                    <option value="other">Other</option>

                </select><br /><br />

                <label class="label"  for="religion">Religion/Believe: </label><br />

                <select class="input" name="religion" >

                    <option value="">--select--</option>

                    <option value="Islam">Islam</option>

                    <option value="Christianity">Christianity</option>

                    <option value="Hinduism">Hinduism</option>

                    <option value="Judaism">Judaism</option>

                    <option value="Atheist">Atheist</option>

                    <option value="other">Other</option>

                </select><br /><br />



                <label class="label" for="maritalStatus">Marital Status: </label>

                <select class="input" name="m_status">

                    <option value="married">Married</option>

                    <option value="single">Single</option>

                    <option value="divorced">Divorced</option>

                    <option value="widowed">Widowed</option>

                    <option value="civil partners">Civil partners</option>

                </select><br />

                <input class="submit" type="submit" name="sbm_bt1" value="Next">

            </fieldset>

        </form>



        <?php

        }

        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbm_bt1'])) {

            // execute if requested using HTTP POST Method

            $member_ID = $path;

            $f_name = $_POST["f_name"];

            $u_name = $_POST["u_name"];

            $gender = $_POST["gender"];

            $dob = $_POST["dob"];

            $study_level = $_POST["study_level"];

            $religion = $_POST["religion"];

            $nationality = $_POST["nationality"];

            $ethnic = $_POST["ethnic"];

            $height = $_POST["height"];

            $m_status = $_POST["m_status"];

            $course_ID =$path;









            require_once 'dbConnect.php';



            try {

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // set the PDO error mode to exception

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



                $sql = "INSERT INTO members (member_ID, f_name,  username, gender, dob, study_level, religion, nationality, ethnic, height, m_status, course_ID)

					VALUES ('$member_ID','$f_name', '$u_name', '$gender', '$dob', '$study_level', '$religion', '$nationality', '$ethnic', '$height', '$m_status', '$course_ID')";

                // use exec() because no results are returned

                $conn->exec($sql);

                header('location: form.php?sbm_bt=Next');

            }

            catch(PDOException $e)

            {

                echo $sql . "<br>" . $e->getMessage();

            }



            $conn = null;



        }

        // execute if requested using HTTP POST Method

        elseif(isset($_GET['sbm_bt'])== 'Next' && $_SERVER['REQUEST_METHOD'] ==='GET') {

        // execute if requested using HTTP POST Method



        ?>

        <div id="page">

            <header>

                <link href="a.profilestyle.css" type="text/css" rel="stylesheet">

                <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

                <h1 id="title">SPUC</h1>

            </header>

            <main>

                <h2>Programme of Study</h2>

                <br />

                <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" >

                    <fieldset>

                        <legend>Course</legend><br />

                        <label class="label" for="course">Course Name: </label>

                        <input class="input"  type="text" name="course_name" required><br /> <br />

                        <label class="label" for="Department">Department: </label>

                        <input class="input"  type="text" name="department" ><br /><br />

                        <label class="label" for="start_date">Start Date: </label>

                        <input class="input"  type="date" name="start_date" /><br /><br />

                        <label class="label" for="end_date">End Date: </label>

                        <input class="input"  type="date" name="end_date" /><br /><br />

                        <input class="submit" type="submit" name="sbm_bt2" value="Next">

                    </fieldset>

                </form>

                <?php

                }

                elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbm_bt2'])) {

                    // execute if requested using HTTP POST Method



                    $course_name = $_POST["course_name"];

                    $department = $_POST["department"];

                    $start_date = $_POST["start_date"];

                    $end_date = $_POST["end_date"];



                    $course_ID =$path;









                    require_once 'dbConnect.php';



                    try {

                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                        // set the PDO error mode to exception

                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



                        $sql = "INSERT INTO course (course_ID, course_name,  department, start_date, end_date)

					VALUES ('$course_ID','$course_name', '$department', '$start_date', '$end_date')";

                        // use exec() because no results are returned

                        $conn->exec($sql);

                        header('location: form.php?sbm_bt2=Next');

                    }

                    catch(PDOException $e)

                    {

                        echo $sql . "<br>" . $e->getMessage();

                    }



                    $conn = null;



                }

                // execute if requested using HTTP POST Method

                elseif(isset($_GET['sbm_bt2'])== 'Next' && $_SERVER['REQUEST_METHOD'] ==='GET') {

                // execute if requested using HTTP POST Method



                ?>

                <div id="page">

                    <header>

                        <link href="a.profilestyle.css" type="text/css" rel="stylesheet">

                        <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

                        <h1 id="title">Campus Dating</h1>

                    </header>

                    <main>

                        <h2> Interest Details</h2>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" >

                            <fieldset>

                                <legend>About me</legend><br />

                                <label  class="label" for="sexualorient">Sexual Orientation:</label>

                                <select class="input" name="sexualorient">

                                    <option value="">--select--</option>

                                    <option value="Hetrosexual">Hetrosexual</option>

                                    <option value="Homosexual">Homosexual</option>

                                    <option value="Bisexual">Bisexual</option>

                                </select><br /><br />

                                <label class="label" for="hobby">Hobby:</label>

                                <input class="input" type="text" name="hobby" ><br /><br />



                                <label class="label" for="looking_for">Looking for: </label>

                                <select class="input" name="looking_for">

                                    <option value="white">Girls</option>

                                    <option value="black">Boys</option>

                                    <option value="other">Other</option>

                                </select><br />

                                <input class="submit" type="submit" name="sbm_bt3" value="Next">

                            </fieldset>

                        </form>

                        <?php

                        }

                        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbm_bt3'])) {

                            // execute if requested using HTTP POST Method

                            $member_ID =$path;

                            $sexual_orientation = $_POST["sexualorient"];

                            $hobby = $_POST["hobby"];

                            $looking_for = $_POST["looking_for"];



                            $activity_iD =$path;



                            $profile = "Y";





                            require_once 'dbConnect.php';



                            try {

                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                                // set the PDO error mode to exception

                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



                                $sql = "INSERT INTO interest (member_ID, sexual_orientation, hobby,  looking_for,  activity_iD, profile)

					VALUES ('$member_ID','$sexual_orientation', '$hobby', '$looking_for', '$activity_iD', '$profile')";

                                // use exec() because no results are returned

                                $conn->exec($sql);

                                header('location: form.php?sbm_bt4=Next');

                            }

                            catch(PDOException $e)

                            {

                                echo $sql . "<br>" . $e->getMessage();

                            }



                            $conn = null;



                        }



                        // execute if requested using HTTP POST Method

                        elseif(isset($_GET['sbm_bt4'])== 'Next' && $_SERVER['REQUEST_METHOD'] ==='GET') {

                        // execute if requested using HTTP POST Method



                        ?>

                        <div id="page">

                            <header>

                                <link href="a.profilestyle.css" type="text/css" rel="stylesheet">

                                <h1><img src="RGU_logo.jpg" width="100" height="100" alt="RGU_logo"></h1>

                                <h1 id="title">SPUC</h1>

                            </header>

                            <main>

                                <h2> Profile Picture</h2>



                                <fieldset>

                                    <legend>Upload picture</legend><br />

                                    <form action="a.upload.php" method="post" enctype="multipart/form-data">

                                        Select image to upload:

                                        <input class="input" type="file" name="fileToUpload" id="fileToUpload">

                                        <input class="submit" type="submit" value="Upload Image" name="submit">



                                </fieldset>

                                </form>

                                <?php

                                }

                                ?>



                            </main>

                            <footer>

                                <p>copyright Team D</p>

                            </footer>

                        </div>

</body>

</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 17:18
 */