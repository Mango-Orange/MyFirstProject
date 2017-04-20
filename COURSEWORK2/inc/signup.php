<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    include("scripts/header.php");

    // execute if requested using HTTP GET Method

    ?>
    <main>
        <H1>REGISTER</H1>
        <form action="signup.php" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="password" name="password" placeholder="password"></br>
            <p><input type="submit" value="Submit"></p>
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
            $sql = $this->conn->prepare("INSERT INTO users(username,password) 

			                                             VALUES(:username, :password)");
            
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

