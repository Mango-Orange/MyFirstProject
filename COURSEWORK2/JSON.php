<?php
//open connection to my mysql db
$connection = mysqli_connect("hostname", "username","password","users") or die("Error 1 " . mysqli_error($connection));

//fetch table rows from mysql db
$sql = "SELECT * FROM users";
$result = mysqli_query($connections, $sql) or die("Error in selecting " . mysqli_error($connections));

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] =$row;
}

echo json_encode($emparray);

//close the db connection
mysqli_close($connections);
?>


