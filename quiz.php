<?php
require_once "html.php";
head();
$thisisaquiz = !array_key_exists("author", $_GET);

if($thisisaquiz)
	echo "<h2>Quiz Instructions</h2>
		<p>For each proposition, decide your level of agreement with it.
		No answer is right or wrong. However, you cannot remain neutral. This test is to
		help gauge your particular ideology surrounding free and open source
		culture.</p>";
else
	echo "<h2>" . $authors[$_GET["author"]]->get_auth_name() . "</h2>
		<p>This is how we believe the author would have completed the survey.
		The rightmost column lists the relevant references, as enumerated on the <a href=\"readlist.php\">Reading List</a> page.</p>";
 
$tobedisplayed = $survey;
if(!$thisisaquiz) {
	$tobedisplayed = $authors[$_GET["author"]]->get_all_the_things();
}

echo "<form action=\"result.php\" action=\"get\">"; // TODO validate the results
echo "<table width=\"100%\">";
foreach($tobedisplayed as &$question)
	echo $question;
if($thisisaquiz)
	echo "<tr><td class=\"centered\" colspan=\"2\"><input type=\"submit\"/></td></tr>";
echo "</table>";

foot();
?>
