<?php

function createHead($pageName) {
	session_start();
	echo "<!DOCTYPE html>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "<title>".$pageName." - Elo System</title>\n";
	
	echo "<link rel='stylesheet' href='css/normalize.css'>";
	echo "<link rel='stylesheet' href='css/skeleton.css'>";
	
	echo "<link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>";

	echo "</head>\n";
}
function createBodyStart($title) {
	echo "<body>\n";
	echo "<div class='container'>";
	echo "<hr />";
	echo "<h1>".$title."</h1>\n";
	echo "<hr />";
}

function createBodyEnd() {
	echo "</div>";
	echo "</body>\n";
	echo "</html>\n";
}

?>