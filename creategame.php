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
		
	echo "<form action='creategamefinal.php' method='post'>";
	
	echo "<div class='row'>";
	
	echo "<div class='four columns'>";
	echo "<label for='white'>White</label>";
	echo "<select class='u-full-width' name=\"white\">\n";
	createUserSelectOptions();
	echo "</select>\n";
	echo "</div>";
	
	echo "<div class='four columns'>";
	echo "<label for='black'>Black</label>";
	echo "<select class='u-full-width' name=\"black\">\n";
	createUserSelectOptions();
	echo "</select>\n";
	echo "</div>";
	
	echo "</div>";
	
	echo "<div class='row'>";
	
	echo "<div class='four columns'>";
	echo "<fieldset>";
	echo "<label for=''>Winner</label>";
	echo "<input type='radio' name='winner' value='1' /><span>White</span><br />";
	echo "<input type='radio' name='winner' value='0' /><span>Black</span><br />";
	echo "<input type='radio' name='winner' value='0.5' checked /><span>Draw</span>";
	echo "</fieldset>";
	echo "</select>";
	echo "</div>";
	
	echo "<div class='four columns'>";
	echo "<label for='k'>k</label>";
	echo "<input type=\"number\" name=\"k\" value=\"20\">";
	echo "<p>The higher k, the more the game influences the score</p>";
	echo "</div>";
	echo "</div>";
	
	echo "<button class='button button-primary' type=\"submit\">Log game</button>";
	echo "</form>\n";
		
}
else{
	echo "<p>You must be signed in to create a new user</p>";
}
createBodyEnd();
?>