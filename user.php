<?php
include 'master.php';

if (!isset($_GET["username"]))
	fatalError("Undefined user", "You must specify a user when calling this page.");

$username = $_GET["username"];

if (!userExists($username))
	fatalError("Unknown user", "The user \"". $username. "\" does not exist.");

$name = getUserRealName($username);
$elo = getUserScore($username);

createHead($name);
createBodyStart($name);

echo "<p><strong>Score:</strong> ". round($elo, 2);

echo "<p>More statistics coming soon</p>";

echo "<a class='button button-primary' href='index.php'>Back to the index</a>";

createBodyEnd();
?>