<?php

include ("scripts/header.php");

echo " 
<main>
    <main>
        <H1>REGISTER</H1>
        <form action="signup.php" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Submit"></p>
        </form>
    
    </main>
    
\";

include (\"scripts/footer.php\");

?>