<?php
session_start();
if (isset($_SESSION['username'])) //SESSION DOES EXIST
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        include("scripts/header.php");
        ?>
        <main>

            <form action="">

                <fieldset>

                    <legend>Profile Details</legend>

                    <label for="firstName">First name: </label>

                    <input type="text" name="firstName" /><br />

                    <label for="surName">Surname: </label>

                    <input type="text" name="surName" /><br />

                    <label for="dob">DoB: </label>

                    <input type="date" name="dob" /><br />

                    <label for="email">RGU email: </label>

                    <input type="email" name="email" /><br />

                    <label for="height">Height(in centimeters): </label>

                    <input type="number" name="height" min="30" max="350" /><br />

                    <label for="gender">Gender: </label>

                    <select name="gender">

                        <option value="male">Male</option>

                        <option value="female">Female</option>

                    </select><br />

                    <label for="ethnicity">Ethnicity: </label>

                    <select name="ethnicity">

                        <option value="white">White</option>

                        <option value="black">Black</option>

                        <option value="asian">Asian</option>

                        <option value="Indian">Indian</option>

                        <option value="notTell">Rather not tell</option>

                        <option value="other">Other</option>

                    </select><br />

                    <label for="department">Department: </label>

                    <input type="text" name="department" /><br />

                    <label for="programme">Programme: </label>

                    <input type="text" name="programme" /><br />

                    <label for="maritalStatus">Marital Status: </label>

                    <select name="maritalStatus">

                        <option value="married">Married</option>

                        <option value="single">Single</option>

                        <option value="divorced">Divorced</option>

                        <option value="widowed">Widowed</option>

                        <option value="civil partners">Civil partners</option>

                    </select><br />

                </fieldset>

            </form>

            <form action="" method="post">

                <fieldset>

                    <legend>About me</legend>

                    <label for="interests">Interests and hobbies: </label>

                    <input type="textarea" name="interests"><br />


                </fieldset>

            </form>



            <form action="" method="post">

                <fieldset>

                    <legend>Pictures</legend>

                    <label for="profilepic">Profile picture</label><br />

                    <input type="file" name="profilepic" />

                    <br /><br />

                    <legend>Other pictures</legend>

                    <label for="otherpics"></label>

                    <input type="file" name="otherpics" />

                    <input type="button" name="upload" value="Upload photo">


                </fieldset><br />

                <input type="submit" name="submit" value="Submit" />

                <br />

                <a href="Photoupload.html"><input type="button" name="nextpage" value="Proceed to next page" /></a>

            </form>


        </main>
        <?
        include("scripts/footer.php");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include ('scripts/ConnectToAzureDB.php');
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