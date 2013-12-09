<?php
require_once "class/pData.class.php";
require_once "class/pDraw.class.php";
require_once "class/pImage.class.php";
require_once "class/pScatter.class.php";
require_once "html.php";

head();

$you = new Author("You", array("R"=>0,"G"=>0,"B"=>0), $survey, 
            array_values($_GET));

array_push($authors, $you);

?>

<h2>Quiz Results</h2>
The graph below plots your opinions against those of industry leaders. Your
previous rankings contributed points to two categories: <i>Mutability</i> and
<i>Sharability</i>. Mutability concerns the actions you believe appropriate when
changing a cultural work, wether it be for public or private consumption.
Shareability concerns the means with which you believe a cultural work may be
distributed around the globe.</p>

<!--<p>For a detailed look at our scoring methodology, view <a>this
page</a></p>-->

<p>Scores plotted in the bottom left correlate with modern capitalist business
interests. Scores plotted in the top right correleate with opinions
supporting free software and culture.</p>

<?php

echo "<p>You scored: (M = " . $you->get_s_val() . ", S = " . $you->get_m_val() .
")</p>";

/* Create the pData object */
$myData = new pData();  


$authIndex = 1;
/* plot the predefined authors */
foreach($authors as $author) {
    $m = $author->get_m_val();
    $mSerieName = $author->get_auth_name() . "_m";

    $s = $author->get_s_val();
    $sSerieName = $author->get_auth_name() . "_s";

    $myData->addPoints($m, $mSerieName);
    $myData->setSerieOnAxis($mSerieName, 0);
    
    $myData->addPoints($s, $sSerieName);
    $myData->setSerieOnAxis($sSerieName, 1);
 

    $myData->setScatterSerie($mSerieName, $sSerieName, $authIndex);
    $myData->setScatterSerieDescription($authIndex, $author->get_auth_name());
    $myData->setScatterSerieColor($authIndex, $author->get_color());

    ++$authIndex;
}

/* Create the X axis and the binded series */
$myData->setAxisName(0,"Mutability");
$myData->setAxisXY(0,AXIS_X);
$myData->setAxisPosition(0,AXIS_POSITION_TOP);

/* Create the Y axis and the binded series */
$myData->setAxisName(1,"Shareability");
$myData->setAxisXY(1,AXIS_Y);
$myData->setAxisPosition(1,AXIS_POSITION_LEFT);

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
$myScatter->drawScatterScale(["Mode"=>SCALE_MODE_MANUAL, "ManualScale"=>[0=>["Min"=>-20, "Max"=>20], 1=>["Min"=>-20, "Max"=>20]]]);

/* Draw the legend */
$myScatter->drawScatterLegend(280,300,array("Mode"=>LEGEND_VERTICAL,"Style"=>LEGEND_NOBORDER,
"FontSize"=>16));

/* Draw a scatter plot chart */
$myPicture->Antialias = TRUE;
$myScatter->drawScatterPlotChart();
$myPicture->drawLine(40, 205, 370, 205); // X axis
$myPicture->drawLine(205, 40, 205, 370); // Y axis

//$myPicture->drawLine(122, 40, 122, 370); // Y axis
//$myPicture->drawLine(287, 40, 287, 370); // Y axis
//$myPicture->drawLine(486, 40, 486, 370); // Y axis

/* Render the picture (choose the best way) */
$myPicture->render("img/img.png");

echo "<img src=\"img/img.png\"/>";
foot();
?>
