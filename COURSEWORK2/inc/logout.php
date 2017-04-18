<?
session_start();
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
header("location:./");
?>  
/**
 * Created by PhpStorm.
 * User: 1615396
 * Date: 18/04/2017
 * Time: 14:54
 */