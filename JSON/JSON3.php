<?php

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {


    include("Connectdb.php");

    $username = $_POST["username"];
    $password = $_POST["password"];


    $dbname = "localdb";


    
    //fetch table rows from mysql db
    $sql = "select * from users";
    $result = mysqli_query($dbname, $sql) or die("Error in Selecting " . mysqli_error($dbname));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
                $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
    mysqli_close($dbname);

else {
    // this is impossible
    print('whoops');
}
?>
