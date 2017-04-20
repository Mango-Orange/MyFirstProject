<?php
include ("scripts/ConnectToAzureDB.php");
include ("scripts/header.php");

echo "
<main>
<h2>Terms and Conditions</h2>
<p>By accessing or using the Student Photo Upload Commenter (SPUC), you agree to be bound by these terms of use (\"Terms of Use\"). The Service is owned or controlled by CMM007 Ltd. These Terms of Use affect your legal rights and obligations. If you do not agree to be bound by all of these Terms of Use, do not access or use Student Photo Upload Commenter (SPUC).

Terms

1.	You may not post violent, nude, partially nude, discriminatory, unlawful, infringing, hateful, pornographic or sexually suggestive photos or other content via the Service.
2.	You are responsible for keeping your password secret and secure.
3.	You are solely responsible for your conduct and any data, text, files, information, usernames, images, graphics, photos, profiles, audio and video clips, sounds, musical works, works of authorship, applications, links and other content or materials (collectively, \"Content\") that you submit, post or display on (SPUC).
</p>
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