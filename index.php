<html>
<head><title>FOSCompass</title></head>
<body>
<?php
require "survey.php";
echo "<form action=\"result.php\" action=\"get\">"; // TODO validate the results
echo "<table>";
foreach($survey as &$question)
	echo $question;
echo "<tr><td colspan=\"2\"><input type=\"submit\"/></td></tr>";
echo "</table>";

?>
</body>
</html>
