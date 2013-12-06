<?php
require "class/pData.class.php";
require "class/pDraw.class.php";
require "class/pImage.class.php";
require "class/pScatter.class.php";
require "html.php";
require "survey.php";
require "author.php";
head();

$s = 0;
$m = 0;

foreach($_GET as $key => $value) {
	$s += $survey[$key]->get_shareability($value);
	$m += $survey[$key]->get_mutability($value);
}

echo $s . "<br/>" . $m . "<br/>";

/* Create the pData object */
$myData = new pData();  

/* Create the X axis and the binded series */
$myData->addPoints($m, "m");
$myData->setSerieOnAxis("m",0);
$myData->setAxisName(0,"Mutability");
$myData->setAxisXY(0,AXIS_X);
$myData->setAxisPosition(0,AXIS_POSITION_TOP);

/* Create the Y axis and the binded series */
$myData->addPoints($s, "s");
$myData->setSerieOnAxis("s",1);
$myData->setAxisName(1,"Shareability");
$myData->setAxisXY(1,AXIS_Y);
$myData->setAxisPosition(1,AXIS_POSITION_LEFT);


$authIndex = 0;
/* plot the predefined authors */
foreach($authors as $author) {
    $m = $author->get_m_val();
    $mSerieName = $author->get_auth_name() + "_m";

    $s = $author->get_s_val();
    $sSerieName = $author->get_auth_name() + "_s";

    $myData->addPoints($m, $mSerieName);
    $myData->setSerieOnAxis($mSerieName, 0);
    
    $myData->addPoints($s, $sSerieName);
    $myData->setSerieOnAxis($sSerieName, 1);
 
    ++$authIndex;

    $myData->setScatterSerie($mSeriename, $sSerieName, $authIndex);
    $myData->setScatterSerieDescription($authIndex, $author->get_auth_name());
    $myData->setScatterSerieColor($authIndex, $author->get_color());
}

/* Create the 1st scatter chart binding */
$myData->setScatterSerie("m","s",0);
$myData->setScatterSerieDescription(0,"You");
$myData->setScatterSerieColor(0,array("R"=>0,"G"=>0,"B"=>0));

/* Create the pChart object */
$myPicture = new pImage(400,400,$myData);

/* Turn of Anti-aliasing */
$myPicture->Antialias = FALSE;

/* Add a border to the picture */
$myPicture->drawRectangle(0,0,399,399,array("R"=>0,"G"=>0,"B"=>0));

/* Set the default font */
$myPicture->setFontProperties(array("FontName"=>"fonts/pf_arma_five.ttf","FontSize"=>6));

/* Set the graph area */
$myPicture->setGraphArea(40,40,370,370);

/* Create the Scatter chart object */
$myScatter = new pScatter($myPicture,$myData);

/* Draw the scale */
$myScatter->drawScatterScale(["Mode"=>SCALE_MODE_MANUAL, "ManualScale"=>[0=>["Min"=>-10, "Max"=>10], 1=>["Min"=>-10, "Max"=>10]]]);

/* Draw the legend */
$myScatter->drawScatterLegend(280,380,array("Mode"=>LEGEND_HORIZONTAL,"Style"=>LEGEND_NOBORDER));

/* Draw a scatter plot chart */
$myPicture->Antialias = TRUE;
$myScatter->drawScatterPlotChart();

/* Render the picture (choose the best way) */
$myPicture->render("img/img.png");

echo "<img src=\"img/img.png\"/>";
foot();
?>
