<?

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';


foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }

    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

$db = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);

//fetch table rows from mysql db
$sql = "SELECT * FROM users WHERE username='" . $username . "' and password='" . $password . "'";
$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));
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

