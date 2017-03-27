<?php
include 'master.php';
include 'elements.misc.php';

if (!isset($_GET["elowhite"]) || !isset($_GET["eloblack"]) || !isset($_GET["k"]))
{
	createHead("Predict game");
	createBodyStart("Predict game");
	
	echo "<form action='predictgame.php' method='get'>";
	
	echo "<label for='elowhite'>Elo White</label>";
	echo "<input type='number' name='elowhite' value='500' />";
	
	echo "<label for='eloblack'>Elo Black</label>";
	echo "<input type='number' name='eloblack' value='500' />";
	
	echo "<label for='k'>k</label>";
	echo "<input type='number' name='k' value='40' />";
	
	echo "<p><button class='button button-primary' type=\"submit\">Log game</button></p>";
	
	echo "</form>";
	
	createBodyEnd();
	die;
}

$elowhite = $_GET["elowhite"];
$eloblack = $_GET["eloblack"];
$k = $_GET["k"];

$estimate = gameEstimate($elowhite, $eloblack);
$blackWins = gameScoreChange($estimate, 0, $k);
$draw = gameScoreChange($estimate, 0.5, $k);
$whiteWins = gameScoreChange($estimate, 1, $k);

createHead("$elowhite vs $eloblack");
createBodyStart("$elowhite vs $eloblack");

getWinnerBar($estimate);
echo "<p></p>";
possibility("White", $whiteWins, $elowhite, $eloblack);
possibility("Black", $blackWins, $elowhite, $eloblack);
possibility("Draw", $draw, $elowhite, $eloblack);

function possibility($winnerName, $scoreChange, $elowhite, $eloblack){
	echo "<h2>$winnerName wins:</h2>";
	echo "<p><strong>White:</strong> $elowhite ". textGetScoreChangeWhite($scoreChange, 1). "=". round($elowhite + $scoreChange, 1). "</p>";
	echo "<p><strong>Black:</strong> $eloblack ". textGetScoreChangeBlack($scoreChange, 1). "=". round($eloblack - $scoreChange, 1). "</p>";
}

createBodyEnd();
?>