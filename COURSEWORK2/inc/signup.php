<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

include("scripts/header.php");

// execute if requested using HTTP GET Method
?>
<main>

        <form action=\"\">

            <fieldset>

                <legend>Profile Details</legend>

                <label for=\"Username\">First name: </label>

                <input type=\"text\" name=\"firstName\" /><br />

                <label for=\"email\">RGU email: </label>

                <input type=\"email\" name=\"email\" /><br />

            </fieldset><br />

            <p><input type="submit" value="Submit"></p>

            <br />

        </form>


</main>
    <?

    include("scripts/footer.php");

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {


    include("scripts/ConnectToAzureDB.php");

    $username = $_POST["username"];
    $password = $_POST["password"];


    function checklogin($username, $password, $db)
    {
        $sql = "INSERT INTO users WHERE username='" . $username . "' and password='" . $password . "'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            return true;
        }
        return false;
    }

    if (checklogin($username, $password, $db)) {
        session_start();
        $_SESSION['username'] = $username;
        header("location:./");
    } else {
        header("location:login");
    }


} else {
    // this is impossible
    print('whoops');
}
?>
