<?php
    include("Connectdb.php");

//fetch table rows from mysql db
$sql = "SELECT * FROM localdb WHERE username='" . $username . "' and password='" . $password . "'";
$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));


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
