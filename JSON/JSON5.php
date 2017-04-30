<?php
    include("Connectdb.php");

//fetch table rows from mysql db
$sql = "SELECT * FROM userd WHERE username='" . $username . "' and password='" . $password . "'";
$result = $db->query($sql) or die ("Error in selecting " . mysqli_error($db));
while ($row = $result->fetch_array());

//create an array
$emparray = array();
while ($row = $result->fetch_array())
{
    $emparray[] =$row;
}

echo json_encode($emparray);

//close the db connection
mysqli_close($db);
?>
