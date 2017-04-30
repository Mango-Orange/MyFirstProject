<?php
include("Connectdb.php");


if (!$db) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}
$var = array();
$sql = "SELECT * FROM users";
$result = mysqli_query($db, $sql);

while($obj = mysqli_fetch_object($result)) {
    $var[] = $obj;
}
echo '{"users":'.json_encode($var).'}';

?>