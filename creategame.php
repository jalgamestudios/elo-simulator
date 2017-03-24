<?php
include 'master.php';
createHead("Log Game");

createBodyStart("Log Game");
if (isSignedIn())
{

	if (!is_dir("games")) 
		mkdir("games");
		
	echo "<form action=\"creategamefinal.php\" method=\"post\">\n";
	echo "White: <input type=\"text\" name=\"name\"><br>\n";
	echo "k: <input type=\"number\" name=\"score\" value=\"20\"><br>\n";
	echo "<input type=\"submit\">\n";
	echo "</form>\n";
		
}
else{
	echo "<p>You must be signed in to create a new user</p>";
}
createBodyEnd();
?>