<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h1>PHP Login Form with Session</h1>
<div class="loginBox">
    <h3>Login form</h3>
    <br><br>
    <form method="post" "action=Login.php">
    <label>Username:</label><br>
    <input type="text" name="username" placeholder="username"
    /><br><br>
    <label>Password:</label><br>
    <input type="submit" name="submit" value = "login"/>
    </form>
    <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>
    
</div>
</body>
</html>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 14/04/2017
 * Time: 13:00
 */