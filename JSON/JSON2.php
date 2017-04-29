<?php
//open connection to my mysql db
$connection = mysqli_connect("172.0.0.1:55146", "azure@localhost","Kavala246","localdb") or die("Error 1" . mysqli_error($connection));

//fetch table rows from mysql db
$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
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
