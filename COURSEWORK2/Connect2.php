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

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    print "<p></p>";
    echo "Debugging error number: " . mysqli_connect_errno() . PHP_EOL;
    print "<p></p>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    print "<p></p>";
    exit;
}

echo "A proper connection to MySQL was made!" . PHP_EOL;
print "<p></p>";
echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;
print "<p></p>";


echo "dbhost: " . $connectstr_dbhost;
print "<p></p>";
echo "username: " . $connectstr_dbusername;
print "<p></p>";
echo "dbpassword: " . $connectstr_dbpassword;
print "<p></p>";
echo "dbname: " . $connectstr_dbname;
print "<p></p>";


// create an SQL query as a string
$sql_query = "SELECT * FROM users";
echo "<p>sql_query is: " . $sql_query . "</p>";

// execute the SQL query
$result = mysqli_query($db,$sql_query);

// We can then process the results from this
// iterate over $result object one $row at a time
// use fetch_array() to return an associative array
// process the $row
while($row = mysqli_fetch_array($result)){
    // print out fields from row of data
    echo $row['uid'] . " - " . $row['username'] . " - " . $row['password'];
    echo "<br/>";
}

$result->close();

// close connection to database
$db->close();

//  REMOVE THIS LINE, OR THE CONNECTION WILL CLOSE!:
mysqli_close($link);

?>

