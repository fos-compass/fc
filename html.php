<?php
function head() {
	echo "<html>
	<head>
		<title>FOSS Compass</title>
		<link rel=\"stylesheet\" href=\"style.css\"/>
	</head>
	<body>";

	echo "<div id=\"div-main\">

<div id=\"div-nav\">
	<ul class=\"nav\">
		<li><a class=\"nav-a\" href=\"landing.php\">Home</a></li>
		<li><a class=\"nav-a\" href=\"index.php\">Take the Quiz</a></li>
		<li><a class=\"nav-a\" href=\"readlist.php\">Reading List</a></li>
	</ul>
</div>

<div id=\"div-content\">";
}

function foot() {
	echo "</div>";
	echo "</div>";
	echo "</body>";
	echo "</html>";
}
?>
