<?php

function buildGamelist()
{
	echo "<table>";

	echo "<thead><tr>";
	echo "<th>White</th>";
	echo "<th>Black</th>";
	echo "<th>Date</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	$games = getGames();
	
	$counter = 1;
	
	foreach ($games as $game)
	{
		if ($counter < 20)
		{
			printGame($game);
		}
		$counter++;
	}
		
	echo "</tbody>";
	echo "</table>";
}

function printGame($gameID){
	echo "<tr>";
	
	$whiteName = getUserRealName(gameGetWhite($gameID));
	$blackName = getUserRealName(gameGetBlack($gameID));
	
	$pointsForWhite = gameGetPointsForWhite($gameID);
	
	$k = gameGetK($gameID);
	$whiteOldRating = gameGetWhiteScore($gameID);
	$blackOldRating = gameGetBlackScore($gameID);
	
	$estimate = gameEstimate($whiteOldRating, $blackOldRating);
	$scoreChange = gameScoreChange($estimate, $pointsForWhite, $k);
	
	$scoreChangeWhite = "";
	$scoreChangeBlack = "";
	if ($scoreChange > 0)
	{
		$scoreChangeWhite = "+". intval($scoreChange);
		$scoreChangeBlack = intval(-$scoreChange);
	}
	if ($scoreChange < 0)
	{
		$scoreChangeWhite = intval($scoreChange);
		$scoreChangeBlack = "+". intval(-$scoreChange);
	}
	if ($scoreChange == 0)
	{
		$scoreChangeWhite = "±0";
		$scoreChangeBlack = "±0";
	}
	
	
	echo "<td>";
	if ($pointsForWhite > 0.5)
		echo "<strong>";
	echo $whiteName;
	if ($pointsForWhite > 0.5)
		echo "</strong>";
	echo " (". $whiteOldRating. $scoreChangeWhite.")";
	echo "</td>";
	echo "<td>";
	if ($pointsForWhite < 0.5)
		echo "<strong>";
	echo $blackName;
	if ($pointsForWhite < 0.5)
		echo "</strong>";
	echo " (". $blackOldRating. $scoreChangeBlack.")";
	echo "</td>";
	echo "<td>N/A</td>";
	echo "</tr>";
}
?>