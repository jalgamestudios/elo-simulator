<?php
include 'master.php';
include 'elements.leaderboard.php';
include 'elements.gamelist.php';
createHead("Elo System");
createBodyStart("Welcome to the Elo System");

echo "<div class='row'>";

echo "<div class='four columns value-prop'>";
echo "<h2>Leaderboard</h2>";
buildLeaderboard();
echo "</div>\n";

echo "<div class='four columns value-prop'>";
echo "<h2>Latest games</h2>";
buildGamelist();
echo "</div>\n";

echo "<div class='four columns value-prop'>";

if (isSignedIn())
{
	echo "<h2>Control Panel</h2>";
	echo "<p>You are signed in.</p>";
	echo "<a class='button button-primary' href='creategame.php'>Log a game</a><br />";
	echo "<a class='button' href='createuser.php'>Create User</a><br />";
	echo "<a class='button' href='signout.php'>Sign Out</a>";
}
else
{
	echo "<h2>Login </h2>\n";
	echo "<a class='button button-primary' href='signin.php'>Log in</a>";
}

echo "</div>";
echo "</div>";

createBodyEnd();
?>