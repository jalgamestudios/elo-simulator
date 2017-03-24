<?php
include 'master.php';
createHead("Create User");

createBodyStart("Create User");
if (isSignedIn())
{

	if (!is_dir("users")) 
		mkdir("users");
		
	echo "<form action=\"createuserfinal.php\" method=\"post\">\n";
	echo "Name: <input type=\"text\" name=\"name\"><br>\n";
	echo "Initial Rating: <input type=\"number\" name=\"score\" value=\"500\"><br>\n";
	echo "<input type=\"submit\">\n";
	echo "</form>\n";
		
}
else{
	echo "<p>You must be signed in to create a new user</p>";
}
createBodyEnd();
?>