<?php
//open connection to my mysql db
$connection = mysqli_connect("alexapp04.azurewebsites.net/", "azure@localhost ", "Kavala246","localdb") or die("Error " . mysqli_error($connection));

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
