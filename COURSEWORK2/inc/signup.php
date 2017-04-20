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

$sql=\"INSERT INTO users (username, password) VALUES ($name, $email)\";
$result = $db->query($sql);

    function checklogin($username, $password, $db)
    {
        $sql = \"SELECT * FROM users WHERE username='\" . $username . \"' and password='\" . $password . \"'\";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            return true;
        }
        return false;
    }

    if (checklogin($username, $password, $db)) {
        session_start();
        $_SESSION['username'] = $username;
        header(\"location:./\");
    } else {
        header(\"location:login\");
    }


} else {
    // this is impossible
    print('whoops');

</main>
";

include ("scripts/footer.php");

?>




