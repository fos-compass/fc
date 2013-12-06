<?php
require_once "html.php";
require_once "survey.php";
head();

echo "<form action=\"result.php\" action=\"get\">"; // TODO validate the results
echo "<table>";
foreach($survey as &$question)
	echo $question;
echo "<tr><td class=\"centered\" colspan=\"2\"><input type=\"submit\"/></td></tr>";
echo "</table>";

foot();
?>
