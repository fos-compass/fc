<?php
require_once "html.php";
head();
 ?>
 
<h2>Quiz Instructions</h2>
<p>For each proposition, decide your level of agreement with that proposition.
No answer is right or wrong. However, you cannot remain neutral. This test is to
help guage your particular ideology surrounding free and open source
culture.</p>
 
<?php
$tobedisplayed = $survey;
if(array_key_exists("author", $_GET)) {
	require_once "author.php";
	$tobedisplayed = $authors[$_GET["author"]]->get_all_the_things();
}

echo "<form action=\"result.php\" action=\"get\">"; // TODO validate the results
echo "<table>";
foreach($tobedisplayed as &$question)
	echo $question;
if(!array_key_exists("author", $_GET))
	echo "<tr><td class=\"centered\" colspan=\"2\"><input type=\"submit\"/></td></tr>";
echo "</table>";

foot();
?>
