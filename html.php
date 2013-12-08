<?php
require_once "author.php";

function head() {
	global $authors;

	echo "<html>
	<head>
		<title>FOSS Compass</title>
		<link rel=\"stylesheet\" href=\"style.css\"/>
	</head>
	<body>";

	echo "<div id=\"div-main\">

<div id=\"div-nav\">
	<p class=\"nav\">Navigation</p>
	<ul class=\"nav\">
		<li><a class=\"nav-a\" href=\"index.php\">Home</a></li>
		<li><a class=\"nav-a\" href=\"quiz.php\">Take the Quiz</a></li>
		<li><a class=\"nav-a\" href=\"readlist.php\">Reading List</a></li>
	</ul>

	<p class=\"nav\">Author responses</p>
	<ul class=\"nav\">";
	for($authidx = 0; $authidx < count($authors); ++$authidx)
		echo "<li><a class=\"nav-a\" href=\"quiz.php?author={$authidx}\">{$authors[$authidx]->get_auth_name()}</a></li>";
	echo "</ul>
	</div>
<div id=\"div-content\">

<h1><img id=\"logo\" src=\"compass.svg\" alt=\"compass symbol\" />
FOSS Compass!</h1>
";

}

function foot() {
	echo "</div>";
	echo "</div>";
	echo "</body>";
	echo "</html>";
}
?>
