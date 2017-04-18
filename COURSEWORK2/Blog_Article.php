<?php 

include ("ConnectToAzureDB.php"); 
include ("scripts/header_l2.php"); 
 
$articleID = $params['blogID'];
echo " 
<main> 
";
 
$sql = "SELECT * FROM blogArticles where articleID = '$articleID'"; 
$result = $db->query($sql);

while($row = $result->fetch_array()) 
{ 
    $articleID = $row['articleID']; 
    $articleName = $row['articleName']; 
    $articleAuthor = $row['articleAuthor']; 
    $articleText = $row['articleText'];

    echo " 
<atricle> 
<h2>{$articleName}</h2> 
<h3>by {$articleAuthor}</h3> 
{$articleText} 
</atricle>"; 
} 

echo " 
</main> 
"; 
include ("scripts/footer.php");

?>
