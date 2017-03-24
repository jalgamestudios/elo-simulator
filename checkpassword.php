<?php
include 'master.php';
createHead("Password Check");

createBodyStart("Password Check");
	if (file_exists("config/password"))
	{
		$hashedPassword =  password_hash($_POST["password"], PASSWORD_DEFAULT );
		$storedPassword = file_get_contents("config/password");
		if (password_verify($_POST["password"], $storedPassword))
		{
			echo "<p>You have signed in successfully</p>";
			echo "<p><a href=\"index.php\">Return to the index</a></p>";
			$_SESSION["signedin"] = true;
		}
		else
		{
			echo "<p>The password is incorrect</p>";
			echo "<p><a href=\"signin.php\">Try again</a></p>";
			echo "<p><a href=\"index.php\">Return to the index</a></p>";
			
		}
	}
	else
	{
		echo "<p>The password is not configured. <a href=\"signin.php\">Click here to set the password.</a></p>";
	}
	
	

	
createBodyEnd();
?>