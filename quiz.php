<?php
require_once "html.php";
head();

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
