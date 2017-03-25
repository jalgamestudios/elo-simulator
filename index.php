<?php
include 'master.php';
createHead("Elo System");
createBodyStart("Welcome to the Elo System");

echo "<h2>Leaderboard</h2>";
function printLeaderboard($place, $name, $score){
	echo "<p>". $place. " ". $name. " ". $score. "</p>";
}

foreach (getUsers() as $user){
printLeaderboard(1, getUserRealName($user), getUserScore($user));
}
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
	echo "<a href=\"signin.php\">Click here to enter editable mode</a>\n";
}

createBodyEnd();
?>