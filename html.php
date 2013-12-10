<?php
require_once "author.php";

function head($nonsense) {
	global $authors;
	echo $nonsense;
	assert($nonsense != "");

	echo "<html>
	<head>
		<title>FOSS Compass</title>
		<link rel=\"stylesheet\" href=\"style.css\"/>" .
	$nonsense;
	
	echo <<<END
<script type="text/javascript">
function validateForm()
{
	for(var q = 0; q < 17; q++) {
		var one = false;
		var group = document.getElementsByName(q);
		for(var i = 0; i < group.length; i++) { 
			one = one || group[i].checked; 
		}

		if(!one) {
			alert("You must not remain neutral on any question");
			event.returnValue=false;
			return false;
		}
	}

	return true;
}

function mySubmit()
{
	if(validateForm()) {
		document.getElementById("quiz").submit();
	}
}
</script>
END;
	
	echo "</head>
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
