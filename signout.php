<?php
include 'master.php';
createHead("Sign out");
createBodyStart("Sign out");


if (isSignedIn())
{
	signOut();
	echo "<p>You are signed out</p>";
	echo "<p><a href=\"index.php\">Back to the index</a></p>\n";
}
else
{
	echo "<p>You were not logged in and therefore could not sign out.</p>\n";
	echo "<p><a href=\"index.php\">Back to the index</a></p>\n";
}

createBodyEnd();
?>