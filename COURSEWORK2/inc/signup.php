<?php

include ("scripts/header.php");

echo " 
<main>

        <form action=\"\">

            <fieldset>

                <legend>Profile Details</legend>

                <label for=\"Username\">First name: </label>

                <input type=\"text\" name=\"firstName\" /><br />

                <label for=\"email\">RGU email: </label>

                <input type=\"email\" name=\"email\" /><br />

            </fieldset><br />

            <input type=\"submit\" name=\"submit\" value=\"Submit\" />

            <br />

        </form>


</main>
";

include ("scripts/footer.php");

?>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "localDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn);{
   ; die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (username, password)
VALUES ('Alex', 'alex@example.com')";


if (mysqli_query($conn, $sql)) {
   ; echo "New record created successfully";
} else {
 ;  ; echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

