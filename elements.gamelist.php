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
	
	
	$scoreChangeWhite = textGetScoreChangeWhite($scoreChange, 0);
	$scoreChangeBlack = textGetScoreChangeBlack($scoreChange, 0);
	
	echo "<td>";
	if ($pointsForWhite > 0.5)
		echo "<strong>";
	echo $whiteName;
	if ($pointsForWhite > 0.5)
		echo "</strong>";
	echo " (". round($whiteOldRating). $scoreChangeWhite.")";
	echo "</td>";
	echo "<td>";
	if ($pointsForWhite < 0.5)
		echo "<strong>";
	echo $blackName;
	if ($pointsForWhite < 0.5)
		echo "</strong>";
	echo " (". round($blackOldRating). $scoreChangeBlack.")";
	echo "</td>";
	echo "<td>";
	echo date("d. M; G:i",gameGetDate($gameID));
	echo "</td>";
	echo "</tr>";
}
?>