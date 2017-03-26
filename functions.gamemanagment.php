<?php

function createGame($white, $black, $pointsForWhite, $k) {
	
	if (!is_dir("games")) 
		mkdir("games");
	
	$gameID = 1;
	while (file_exists("games/game". str_pad($gameID, 9, '0', STR_PAD_LEFT)))
		$gameID++;
	$filename = "game". str_pad($gameID, 9, '0', STR_PAD_LEFT);
	
	if (file_exists("games/".$filename))
		return 1;
	
	
	
	file_put_contents("games/".$filename, 
	$white."\n".
	$black."\n".
	$pointsForWhite."\n".
	$k);
	
	$whiteScore = getUserScore($white);
	$blackScore = getUserScore($black);
	
	$estimate = gameEstimate($whiteScore, $blackScore);
	
	$changeWhite = gameScoreChange($estimate, $pointsForWhite, $k);
	
	$file = $white. "\n". $black. "\n";
	$file = $file. $pointsForWhite. "\n";
	$file = $file. $k. "\n";
	$file = $file. $whiteScore. "\n";
	$file = $file. $blackScore. "";
	
	setUserScore($white, $whiteScore + $changeWhite);
	setUserScore($black, $blackScore - $changeWhite);
	
	file_put_contents("games/".$filename, $file);
	
	return $filename;
}

function gameEstimate($eloA, $eloB){
	return 1 / (1 + pow(10, ($eloB - $eloA) / 400));
}

function gameScoreChange($estimate, $actualPoints, $k){
	return $k * ($actualPoints - $estimate);
}

function createGameGetErrorString($errorCode) {
	if (errorCode == 0)
		return "Game created successfully";
	if (errorCode == 1)
		return "Game already exists. This should never be the case. Something must have gone wrong.";
	return "Unknown error";
}

?>