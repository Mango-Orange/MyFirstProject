<?php
include ("scripts/ConnectToAzureDB.php");
include ("scripts/header.php");

echo "
<main>
<h2>Blog Articles</h2>
<p>Terms and Conditions</p>
<ul>
";

$sql = "SELECT * FROM blogArticles ";
$result = $db->query($sql);
while($row = $result->fetch_array())
{
    $articleID = $row['articleID'];
    $articleName = $row['articleName'];
    $articleAuthor = $row['articleAuthor'];

    echo "<li><a href='blog/{$articleID}'>{$articleName}</a> by {$articleAuthor}</li>";
}
echo "
</main>
";
include ("scripts/footer.php");

?> 