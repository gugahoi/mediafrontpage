<?php
require_once "config.php";
require_once "functions.php";
require_once "widgets.php";

//turn off warnings
$errlevel = error_reporting();
error_reporting(E_ALL & ~E_WARNING);
if(!include('layout.php'))
{
  // file was missing so include default theme 
  require('default-layout.php');
}
// Turn on warnings
error_reporting($errlevel); 
	
?>
<html>
	<head>
		<title>Media Front Page</title>
		<link rel='stylesheet' type='text/css' href='css/front.css' />
		<script type="text/javascript" language="javascript" src="ajax/ajax.js" />
		
		<!-- START: Dynamic Header Inserts From Widgets -->
<?php
		foreach( $arrLayout as $sectionId => $widgets ) {
			foreach( $widgets as $widgetId => $widget ) {
				renderWidgetHeaders($widget);
			}
		}
		if(strlen($customStyleSheet) > 0) {
			echo "\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"".$customStyleSheet."\">\n";
		}
?>

		<!-- END: Dynamic Header Inserts From Widgets -->
	</head>
	<body>
		<div id='main'>
<?php
			foreach( $arrLayout as $sectionId => $widgets ) {
				echo "\n\t<div id=\"".$sectionId."\">\n";
				foreach( $widgets as $widgetId => $widget ) {
					echo "\n\t\t<div id=\"".$widgetId."\">\n";
					renderWidget($widget);
					echo "\n\t\t</div><!-- ".$widgetId." -->\n";
				}
				echo "\n\t</div><!-- ".$sectionId." -->\n";
			}
?>
		</div><!-- main -->
	</body>
</html>
