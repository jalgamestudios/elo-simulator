<?php
include 'master.php';
include 'elements.leaderboard.php';
createHead("Elo System");
createBodyStart("Welcome to the Elo System");

echo "<div class='row'>";

echo "<div class='four columns value-prop'>";
buildLeaderboard();
echo "</div>\n";

echo "<div class='four columns value-prop'>";
echo "<p>Latest games coming soon</p>";
echo "</div>\n";

echo "<div class='four columns value-prop'>";

if (isSignedIn())
{
	echo "<p>You are signed in</p>";
	echo "<p><a href=\"createuser.php\">Create new user</a></h>";
	echo "<p><a href=\"creategame.php\">Log a game</a></h>";
	echo "<p><a href=\"signout.php\">Sign out</a></h>";
}
else
{
	echo "<h2>Sign in:</h2>\n";
	echo "<a href=\"signin.php\">Click here to enter editable mode</a>";
}

echo "</div>";
echo "</div>";

createBodyEnd();
?>