<?php
//open connection to my mysql db
$db = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,
    $connectstr_dbname) or die("Error 1 " . mysqli_error($db));

//fetch table rows from mysql db
$sql = "SELECT * FROM";
$result = mysqli_query($db, $sql) or die("Error in selecting " . mysqli_error($db));

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


