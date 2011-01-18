<?php   
 /* @ 240,180 Drawing 3D Pie charts with transparent background. */

 /* pChart library inclusions */
 include("../class/pData.class");
 include("../class/pDraw.class");
 include("../class/pPie.class");
 include("../class/pImage.class");

 /* Create and populate the pData object */
 $MyData = new pData();   
 $MyData->addPoints(array(40,30,20),"ScoreA");  
 $MyData->setSerieDescription("ScoreA","Application A");

 /* Define the absissa serie */
 $MyData->addPoints(array("A","B","C"),"Labels");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(240,180,$MyData,TRUE);

 /* Set the default font properties */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

 /* Create the pPie object */ 
 $PieChart = new pPie($myPicture,$MyData);

 /* Enable shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

 /* Draw a splitted pie chart */ 
 $PieChart->draw3DPie(120,90,array("Radius"=>100,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE));

 /* Write the legend box */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Silkscreen.ttf","FontSize"=>6,"R"=>255,"G"=>255,"B"=>255));
 $PieChart->drawPieLegend(140,160,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.draw3DPie.png");
?>