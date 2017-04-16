<?php

session_start();

require_once 'a.class.user.php';

$user = new USER();



$stmt =$user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");

$stmt->execute(array(":uid"=>$_SESSION['userSession']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$path = $row['userID'];





include "a.db.php";

$result=mysql_query("DELETE FROM chat WHERE C_ID='{$path}'");



if(!$user->is_logged_in())

{

    $user->redirect('a.index.php');

}



if($user->is_logged_in()!="")

{

    $user->logout();

    $user->redirect('a.index.php');

}
 


?>
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 16/04/2017
 * Time: 15:33
 */