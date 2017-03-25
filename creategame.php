<?php
include 'master.php';
createHead("Log Game");

function createUserSelectOptions()
{
	foreach (getUsers() as $user)
		echo "<option value=\"". $user. "\">". getUserRealName($user). "</option>";
	
}

createBodyStart("Log Game");
if (isSignedIn())
{

	if (!is_dir("games")) 
		mkdir("games");
		
	echo "<form action=\"creategamefinal.php\" method=\"post\">\n";
	
	echo "<p>White:\n";
	echo "<select name=\"white\">\n";
	createUserSelectOptions();
	echo "</select></p>\n";
	
	echo "<p>Black:\n";
	echo "<select name=\"black\">\n";
	createUserSelectOptions();
	echo "</select></p>\n";
	
	echo "<p>Winner: <select name=\"winner\">\n";
	echo "<option value=\"1\">White</option>\n";
	echo "<option value=\"0.5\">Black</option>\n";
	echo "<option value=\"0\">Draw</option>\n";
	echo "</p></select>\n";
	
	echo "<p>k: <input type=\"number\" name=\"k\" value=\"20\">\n";
	echo "k determines how much the result will affect the scores. 20 is a good default, although a higher number can be used for inexperienced players.</p>";
	echo "<input type=\"submit\">\n";
	echo "</form>\n";
		
}
else{
	echo "<p>You must be signed in to create a new user</p>";
}
createBodyEnd();
?>