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

            <a href=\"Photoupload.html\"><input type=\"button\" name=\"nextpage\" value=\"Proceed to next page\" /></a>

        </form>


</main>
";

include ("scripts/footer.php");

?>