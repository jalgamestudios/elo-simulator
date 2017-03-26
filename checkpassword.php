<?php
include 'master.php';
setUpContentless();
	if (file_exists("config/password"))
	{
		$hashedPassword =  password_hash($_POST["password"], PASSWORD_DEFAULT );
		$storedPassword = file_get_contents("config/password");
		if (password_verify($_POST["password"], $storedPassword))
		{
			header("Location: index.php");
			$_SESSION["signedin"] = true;
			die;
		}
		else
		{
			header("Location: signin.php?pww=true");
			die;
		}
	}
	else
	{
		createHead("Password Configuration");

		createBodyStart("Password Configuration");
		echo "<p>The password is not configured. <a href=\"signin.php\">Click here to set the password.</a></p>";
		createBodyEnd();
	}
?>