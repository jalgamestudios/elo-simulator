<?php
include 'master.php';
createHead("User Creation Finished");

createBodyStart("User Creation Finished");
if (isSignedIn())
{
	$result = createUser($_POST["name"], $_POST["score"]);
	if ($result == 0)
	{
		echo "<p>User created successfully.</p>";
		echo "<p><a href=\"index.php\">Back to the index</a></p>";
	}
	else
	{
		echo "<p>An error occured during user creation:".createUserGetErrorString($result)."</p>";
	}
		
}
else{
	echo "<p>You must be signed in to create a new user</p>";
}
createBodyEnd();
?>