<?php
include 'master.php';
createHead("Game Creation Finished");

createBodyStart("Game Creation Finished");
if (isSignedIn())
{
	$eloWhite = getUserScore($_POST["white"]);
	$eloBlack = getUserScore($_POST["black"]);
	
	$estimate = gameEstimate($eloWhite, $eloBlack);
	
	$white = $_POST["white"];
	$black = $_POST["black"];
	$winner = $_POST["winner"];
	
	$k = $_POST["k"];
	
	$scoreChange = gameScoreChange($estimate, $winner, $k);
	
	$result = createGame(
		$_POST["white"],
		$_POST["black"],
		$_POST["winner"],
		$_POST["k"]);
	if ($result == 0)
	{
		echo "<p>Game logged successfully. Here are some stats:</p>";
		echo "<div class='row'>";
		echo "<div class='six columns'>";
		echo "<h2>Before the game:</h2>";
		echo "<p><strong>White: </strong>". round($eloWhite, 1). "</p>";
		echo "<p><strong>Black: </strong>". round($eloBlack, 1). "</p>";
		
		echo "<label>Chances of winning:</label>";
		echo "<div style='height: 24px; background-color: black; width: 90%; padding: 3px'>";
		echo "<div style='height: 24px; float: left; background-color: white; width: ".round($estimate * 100, 1) ."%'>";
		if ($winner > 0.5)
			echo "🏆";
		echo round($estimate * 100, 1). "%";
		echo "</div>";
		echo "<div style='height: 24px; float: right; background-color: black; text-align: right; font-color: white; width: ".round(100 -$estimate * 100, 1) ."%'><a style='color: white;'>";
		echo round(100 - $estimate * 100, 1) ."%";
		if ($winner < 0.5)
			echo "🏆";
		echo "</a></div>";
		echo "</div>";
		echo "<p></p>"; // Not the cleanest way, but this helps with spacing :)
		
		echo "<p>In the past, ". getUserRealName($white). " won <i>coming soon</i> games and ". getUserRealName($black). " won <i>coming soon</i> games.</p>";
		
		echo "</div>";
		
		echo "<div>";
		echo "<h2>After the game</h2>";
		
		echo "<p><strong>White: </strong>";
		echo round($eloWhite, 1). textGetScoreChangeWhite($scoreChange, 1);
		echo "=". floatval(round($eloWhite + $scoreChange, 1)). "</p>";
		
		echo "<p><strong>Black: </strong>";
		echo round($eloBlack, 1). textGetScoreChangeBlack($scoreChange, 1);
		echo "=". floatval(round($eloBlack - $scoreChange, 1)). "</p>";
		
		echo "</div>";
		echo "</div>";
		
		echo "<p><a class='button button-primary' href=\"index.php\">Back to the index</a></p>";
	}
	else
	{
		echo "<p>An error occured during game creation:".createUserGetErrorString($result)."</p>";
	}
		
}
else{
	echo "<p>You must be signed in to create a new game</p>";
}
createBodyEnd();
?>