<?php
require_once "html.php";
require_once "survey.php";
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
echo "<tr><td class=\"centered\" colspan=\"2\"><input type=" . (array_key_exists("author", $_GET) ? "\"button\" value=\"Return to Results\" onclick=\"history.go(-1)\"" : "\"submit\"") . "/></td></tr>";
echo "</table>";

foot();
?>
