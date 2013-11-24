<?php
require "survey.php";

$s = 0;
$m = 0;

foreach($_GET as $key => $value) {
	$s += $survey[$key]->get_shareability($value);
	$m += $survey[$key]->get_mutability($value);
}

echo $s . "<br/>" . $m;

?>
