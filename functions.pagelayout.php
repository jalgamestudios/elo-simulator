<?php

function createHead($pageName) {
	session_start();
	echo "<!DOCTYPE html>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "<title>".$pageName." - Elo System</title>\n";
	echo "</head>\n";
}
function createBodyStart($title) {
	echo "<body>\n";
	echo "<h1>".$title."</h1>\n";
}

function createBodyEnd() {
	echo "</body>\n";
	echo "</html>\n";
}

?>