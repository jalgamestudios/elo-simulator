<?php
include 'master.php';
createHead("Sign in");

createBodyStart("Sign in");
	if (file_exists("config/password"))
	{
		echo "<p>Please enter the password below. The password is shared server-wide.</p>";
		
		if (isset($_GET["pww"]))
			echo "<p>The password is wrong. Please try again.</p>";
		
		echo "<form action=\"checkpassword.php\" method=\"post\">\n";
		echo "<p><input type=\"password\" name=\"password\"><br>\n";
		echo "<input type=\"submit\">\n";
		echo "</form>\n";
	}
	else
	{
		echo "<p>No password has been configured. Please configure your password now:</p>";
		echo "<form action=\"setpassword.php\" method=\"post\">";
		echo "<p>Password: <input type=\"password\" name=\"password\"></p>";
		echo "<input type=\"submit\">";
		echo "</form>";
	}
	
	

	
createBodyEnd();
?>