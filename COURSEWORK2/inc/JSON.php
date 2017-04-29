<?php
//open connection to my mysql db
include ("scripts/ConnectToAzureDB.php");

//fetch table rows from mysql db
$sql = "SELECT * FROM users";
$result = $db->query($sql);
while ($row = $result->fetch_array());

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
$emparray[] =$row;
}

echo json_encode($emparray);

//close the db connection
mysqli_close($db);
?>


