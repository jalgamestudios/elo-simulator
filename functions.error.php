<?php

function fatalError($title, $message){
	createHead($title);
	createBodyStart($title);
	echo "<p>".$message."</p>";
	echo "<a class='button button-primary' href='index.php'>Back to the index</a>";
	createBodyEnd();
	die;
}

?>