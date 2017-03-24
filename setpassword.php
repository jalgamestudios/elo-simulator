<?php
include 'master.php';
createHead("Password Setup");

createBodyStart("Password Setup");
	if (file_exists("config/password"))
	{
		echo "<p>It looks like someone else already has set a password. You cannot change the password from the web interface. Please contact the administrator. <a href=\"index.php\">Back to the index</a></p>";
	}
	else
	{
		echo "<p>The password has been set:</p>";
		
		// I guess this is a way of doing lazy initialization, but it should work for this system and makes it unnecessary to have a dedicated setup process
		if (!is_dir("config")) 
			mkdir("config");
		
		file_put_contents("config/password", password_hash($_POST["password"], PASSWORD_DEFAULT ));
		
		echo "<p><a href=\"index.php\">Return to the index</a></h>";
	}
	
	

	
createBodyEnd();
?>