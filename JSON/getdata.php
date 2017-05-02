<?php
$json=file_get_contents("http://alexapp04.azurewebsites.net/JSON/JSON.php");
$data =  json_decode($json);

if (count($data->stand)) {
    // Open the table
    echo "<table>";

    // Cycle through the array
    foreach ($data->stand as $idx => $stand) {

        // Output a row
        echo "<tr>";
        echo "<td>$stand->afko</td>";
        echo "<td>$stand->positie</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
}
?>