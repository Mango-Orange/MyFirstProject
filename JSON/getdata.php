<?php
$json=file_get_contents("http://alexapp04.azurewebsites.net/JSON/JSON.php");
$data =  json_decode($json);

print_r($data);

?>
