<?php

function buildLeaderboard()
{
	echo "<table style=''>";

	echo "<thead><tr>";
	echo "<th>#</th>";
	echo "<th>Name</th>";
	echo "<th>Score</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	$users = getUsers();
	$usersScored = array();
	foreach (getUsers() as $user)
	{
		$score = getUserScore($user);
		$usersScored[$user] = $score;
	}
	arsort($usersScored);
	$counter = 1; // I guess I won't win the fight to do this 0-based
	$lastScore = -1;
	$lastCounter = 0;
	foreach ($usersScored as $username => $score)
	{
		if ($counter < 20)
		{
			if ($lastScore != $score)
			{
				$lastScore = $score;
				$lastCounter = $counter;
			}
			printLeaderboard($lastCounter, getUserRealName($username), getUserScore($username));
		}
		$counter++;
	}
		
	echo "</tbody>";
	echo "</table>";
}

function printLeaderboard($place, $name, $score){
	echo "<tr>";
	echo "<td>". $place. "</td>";
	echo "<td>". $name. "</td>";
	echo "<td>". round($score, 0). "</td>";
	echo "</tr>";
}
?>